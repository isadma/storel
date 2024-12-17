<?php


namespace App\Traits;


use App\Helpers\HttpStatus;
use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    public function apiSuccessResponse(array $data, $code = HttpStatus::STATUS_SUCCESS_OK): JsonResponse
    {
        return response()->json(['success' => true] + $data, $code);
    }

    public function apiDeletedResponse(): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Record is successfully deleted.'], HttpStatus::STATUS_SUCCESS_DELETED);
    }
    public function apiUpdatedResponse($data = []): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Record is successfully updated.'] + $data, HttpStatus::STATUS_SUCCESS_UPDATED);
    }
    public function apiCreatedResponse($data = []): JsonResponse
    {
        return response()->json(['success' => true, 'message' => 'Record is successfully created.'] + $data, HttpStatus::STATUS_SUCCESS_CREATED);
    }

    public function apiSuccessDatatable(array $data, $query): JsonResponse
    {
        return response()->json([
            "success" => true,
            "per_page" => $query->perPage(),
            "current_page" => $query->currentPage(),
            "last_page" => $query->lastPage(),
            "next_page_url" => $query->nextPageUrl(),
            "previous_page_url" => $query->previousPageUrl(),
            "total" => $query->total(),
        ] + $data);
    }

    public function apiErrorResponse($message, $code = HttpStatus::STATUS_ERROR_CUSTOM, $errors = null): JsonResponse
    {
        if ($code == HttpStatus::STATUS_ERROR_VALIDATION){
            return response()->json(['success' => false, 'code' => $code, 'message' => $message, 'errors' => $errors], $code);
        }
        return response()->json(['success' => false, 'code' => $code, 'message' => $message], $code);
    }

    public function apiErrorNotFound(): JsonResponse
    {
        return response()->json(['success' => false, 'code' => HttpStatus::STATUS_ERROR_CUSTOM, 'message' => "Not found. Invalid Item/Record/ID is selected."], HttpStatus::STATUS_ERROR_CUSTOM);
    }

    public function apiErrorNotBelongs(): JsonResponse
    {
        return response()->json(['success' => false, 'code' => HttpStatus::STATUS_ERROR_CUSTOM, 'message' => "The selected item/record does not belong to you."], HttpStatus::STATUS_ERROR_CUSTOM);
    }

    public function apiErrorNotAuthenticated(): JsonResponse
    {
        return response()->json(['success' => false, 'code' => HttpStatus::STATUS_ERROR_AUTH, 'message' => "Please log in or register before proceeding with this action."], HttpStatus::STATUS_ERROR_AUTH);
    }

    public function apiErrorNoAccess(): JsonResponse
    {
        return response()->json(['success' => false, 'code' => HttpStatus::STATUS_ERROR_NO_ACCESS, 'message' => "The selected record is either invalid or does not belong to you."], HttpStatus::STATUS_ERROR_NO_ACCESS);
    }

    public function apiErrorUnverified(): JsonResponse
    {
        return response()->json(['success' => false, 'code' => HttpStatus::STATUS_ERROR_UNVERIFIED, 'message' => "Account is not verified. Please resend the verification number and verify your account."], HttpStatus::STATUS_ERROR_UNVERIFIED);
    }
    public function apiErrorSuspended(): JsonResponse
    {
        return response()->json(['success' => false, 'code' => HttpStatus::STATUS_ERROR_BLOCKED, 'message' => "Account is suspended by administrator."], HttpStatus::STATUS_ERROR_BLOCKED);
    }
}
