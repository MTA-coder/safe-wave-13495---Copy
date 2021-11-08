<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class AuthController extends Controller
{
    private $user;

    /**
     * AuthController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get()
    {
        return ResponseHelper::select(Auth::user());
    }

    public function getOwners()
    {
        $data = $this->user->where('type', UserType::owner)->withCount('halls')->get();
        return ResponseHelper::select($data);
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = $this->user->login($data);
        if (empty($user))
            return ResponseHelper::authenticationFail();
        return ResponseHelper::operationSuccess($user);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        unset($data['confirm_password']);
        $user = $this->user->createData($data);
        if (empty($user))
            return ResponseHelper::operationFail();
        $user->token = $user->createToken('salaApp')->accessToken;
        return ResponseHelper::create($user);
    }

    public function confirmPhone()
    {
        $user = Auth::user();
        if ($user->phone_verified_at != null)
            return ResponseHelper::AlreadyExists('Phone is verified');

        $updated = $this->user->updateData(['id' => $user->id], ['phone_verified_at' => Carbon::now()]);
        return  ResponseHelper::operationSuccess($updated);
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->token()->revoke();
            return ResponseHelper::operationSuccess();
        } catch (\Exception $exception) {
            return ResponseHelper::operationFail();
        }
    }
}