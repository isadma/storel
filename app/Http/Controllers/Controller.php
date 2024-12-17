<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Traits\WebResponse;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests, ApiResponse, WebResponse;

    public function getSorBy(): string
    {
        $sorts = [
            "invoiced_on",
            "created_at",
            "amount",
        ];
        $sortByKey = request()->get("sort_by");
        if (in_array($sortByKey, $sorts)){
            return $sortByKey;
        }
        return "invoiced_on";
    }

    public function getPerPage(): int
    {
        $per_page = (int) request()->get("per_page", 20);
        if ($per_page < 1){
            $per_page = 20;
        }
        return $per_page;
    }

    public function getPageNumber(): int
    {
        return (int) request()->get("page", 1);
    }

    public function getSortOrder(): string
    {
        $order = request()->get("sort_order", "desc");
        if (in_array($order, ["asc", "desc"])){
            return $order;
        }
        return "desc";
    }

    public function getDateRangeType(Request $request, $year = false): array
    {
        $date = $request->get("month", date("Y-m")) . date("-d");
        $from = Carbon::parse($date)->startOfMonth()->format("Y-m-d H:i:s");
        $to = Carbon::parse($date)->endOfMonth()->format("Y-m-d H:i:s");
        $selectedRange = date("F Y");

        if ($request->get("type") == "year" || $year){
            $year = date("Y");
            if ($request->has("year")){
                $year = $request->get("year");
            }
            $date = $year . date("-m-d");
            $from = Carbon::parse($date)->startOfYear()->format("Y-m-d H:i:s");
            $to = Carbon::parse($date)->endOfYear()->format("Y-m-d H:i:s");
            $selectedRange = $year;
        }
        elseif ($request->get("type") == "custom"){
            if ($request->get("from") && $request->get("to")){
                $from = Carbon::parse($request->get("from"))->startOfDay()->format("Y-m-d H:i:s");
                $to = Carbon::parse($request->get("to"))->endOfDay()->format("Y-m-d H:i:s");
                $fromSelectedRange = date("d/m/Y", strtotime($from));
                $toSelectedRange = date("d/m/Y", strtotime($to));
                $selectedRange = "$fromSelectedRange - $toSelectedRange";
            }
        }
        return [
            $from,
            $to,
            $selectedRange
        ];
    }

    public function getDateRangeTypeForYear(Request $request): array
    {
        $year = date("Y");
        if ($request->has("year")){
            $year = $request->get("year");
        }
        $date = $year . date("-m-d");
        $from = Carbon::parse($date)->startOfYear()->format("Y-m-d H:i:s");
        $to = Carbon::parse($date)->endOfYear()->format("Y-m-d H:i:s");
        $selectedRange = $year;
        return [
            $from,
            $to,
            $selectedRange
        ];
    }
    public function getDateRangeTypeForMonth(Request $request): array
    {
        $date = date("Y-m-d");
        if ($request->has("month")){
            $date = $request->get("month", date("Y-m")) . date("-d");
        }
        if ($request->has("year")){
            $date = $request->get("year", date("Y")) . date("-m-d");
        }

        $from = Carbon::parse($date)->startOfMonth()->format("Y-m-d H:i:s");
        $to = Carbon::parse($date)->endOfMonth()->format("Y-m-d H:i:s");
        $selectedRange = date("F Y");

        return [
            $from,
            $to,
            $selectedRange
        ];
    }
}
