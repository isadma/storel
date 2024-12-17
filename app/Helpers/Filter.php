<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Income;
use App\Models\Membership;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;

class Filter
{
    public static function expense_categories(): array
    {
        $categories = [];
        foreach (Category::where("type_id", Category::TYPE_CATEGORY)->get() as $category){
            $categories[] = [
                "id" => $category->id,
                "name" => $category->name,
                "color" => $category->color,
            ];
        }
        return $categories;
    }

    public static function categories(): array
    {
        $categories = [];
        foreach (Category::where("type_id", Category::TYPE_CATEGORY)->get() as $category){
            $categories[] = [
                "id" => $category->id,
                "name" => $category->name,
                "color" => $category->color,
            ];
        }
        return $categories;
    }

    public static function income_categories(): array
    {
        $categories = [];
        foreach (Category::whereIn("type_id", [Category::TYPE_JOB, Category::TYPE_STREAM])->get() as $category){
            $categories[] = [
                "id" => $category->id,
                "name" => $category->name,
                "color" => $category->color,
            ];
        }
        return $categories;
    }

    public static function all_categories(): array
    {
        $categories = [];
        foreach (Category::get() as $category){
            $categories[] = [
                "id" => $category->id,
                "name" => $category->name,
                "color" => $category->color,
            ];
        }
        return $categories;
    }


    public static function getAllFilters(): array
    {
        return [
            "categories" => Filter::expense_categories(),
            "expense_categories" => Filter::expense_categories(),
            "income_categories" => Filter::income_categories(),
            "all_categories" => Filter::all_categories(),
        ];
    }

    public static function getFilterValue($input): array
    {
        if ($input && strlen($input) > 0){
            return explode(",", $input);
        }
        return [];
    }

    public static function getDateRangeFilter($input): array
    {
        $dateRange = explode(",", $input);
        $from = isset($dateRange[0]) && $dateRange[0] ? Carbon::parse($dateRange[0]) : Carbon::now()->startOfMonth();
        $to = isset($dateRange[1]) && $dateRange[1] ? Carbon::parse($dateRange[0])->startOfDay() : Carbon::now()->endOfMonth()->startOfDay();
        if ($to < $from) {
            $temp = $from;
            $from = $to;
            $to = $temp;
        }
        return [$from->startOfDay(), $to->endOfDay()];
    }

    public static function getWebDateRangeFilter($from, $to): array
    {
        $from = $from ? Carbon::parse($from) : Carbon::now()->startOfMonth();
        $to = $to ? Carbon::parse($to)->startOfDay() : Carbon::now()->endOfMonth()->startOfDay();
        if ($to < $from) {
            $temp = $from;
            $from = $to;
            $to = $temp;
        }
        return [$from->startOfDay(), $to->endOfDay()];
    }

    public static function getNumberRangeFilter($input): array
    {
        $amount = explode(",", $input);
        $from = $amount[0] ?? 0;
        $to = $amount[1] ?? 1000000;
        if ($to < $from) {
            $temp = $from;
            $from = $to;
            $to = $temp;
        }
        return [(float) $from, (float) $to];
    }

    public static function apply(array $filters): string
    {
        $inputs = "";
        foreach ($filters as $filter){
            $inputs .= self::$filter();
        }
        return '
            <div class="menu menu-sub menu-sub-dropdown w-500px w-md-500px" data-kt-menu="true">
                <!--begin::Header-->
                <div class="px-7 py-5">
                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                </div>
                <!--end::Header-->
                <!--begin::Menu separator-->
                <div class="separator border-gray-200"></div>
                <!--end::Menu separator-->
                <!--begin::Form-->
                <form id="datatableFilterForm">
                    <div class="px-7 py-5">
                        ' . $inputs . '
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </form>
            </div>
        ';
    }

    public static function sorts(): array
    {
        return [
            [
                "id" => "priority",
                "name" => "By recommended"
            ],
//            [
//                "id" => "delivery_time",
//                "name" => "By delivery time"
//            ],
            [
                "id" => "rating",
                "name" => "By rating"
            ],
            [
                "id" => "price",
                "name" => "By price"
            ],
        ];
    }

    public static function dropdownFilter(string $header, string $inputName, string $options): string
    {
        return '
            <div class="mb-5">
                <label class="form-label fw-semibold">
                '. $header .':
                </label>
                <div>
                    <select name="'. $inputName .'" id="'. $inputName .'" class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true">
                        <option></option>
                        '. $options .'
                    </select>
                </div>
            </div>
        ';
    }
    public static function text(string $header, string $inputName): string
    {
        return '
            <div class="mb-5">
                <label class="form-label fw-semibold">
                '. $header .':
                </label>
                <input name="'. $inputName .'" id="'. $inputName .'" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="'. $header .'">
            </div>
        ';
    }
    public static function dateRange(string $header, string $from = "from", $to = "to"): string
    {
//        return '
//            <div class="mb-5">
//                <label class="form-label fw-semibold">
//                '. $header .':
//                </label>
//                <input name="'. $inputName .'" id="'. $inputName .'" class="form-control form-control-solid mb-3 mb-lg-0 kt_daterangepicker_dropdown" placeholder="'. $header .'">
//            </div>
//        ';
        return '
           <div class="mb-5">
                <label class="form-label fw-semibold">
                '. $header .':
                </label>
                 <div class="input-group input-group-solid mb-3">
                    <input name="'. $from .'" id="'. $from .'" type="date" class="form-control" placeholder="From" aria-label="From" style="border-right-color: var(--bs-gray-300);"/>
                    <span class="input-group-text">-</span>
                    <input name="'. $to .'" id="'. $to .'" type="date" class="form-control" placeholder="To" aria-label="To"/>
                </div>
            </div>

        ';
    }

    public static function name(): string
    {
        return self::text("Name", "name");
    }
    public static function title(): string
    {
        return self::text("Title", "name");
    }
    public static function email(): string
    {
        return self::text("Email", "email");
    }
    public static function date(): string
    {
        return self::dateRange("Date");
    }

    public static function plan(): string
    {
        $data = Membership::get();
        $options = "<option value='all'>All</option>";
        foreach ($data as $item){
            $options .= "<option value='$item->id'>$item->name</option>";
        }
        return self::dropdownFilter("Plan", "plan", $options);
    }

    public static function user(): string
    {
        $data = User::where("is_admin", 0)->orderBy("name")->get();
        $options = "<option value='all'>All</option>";
        foreach ($data as $item){
            $options .= "<option value='$item->id'>$item->fullname | $item->email</option>";
        }
        return self::dropdownFilter("User", "user", $options);
    }

    public static function category(): string
    {
        $data = Category::orderBy("name")->get();
        $options = "<option value='all'>All</option>";
        foreach ($data as $item){
            $options .= "<option value='$item->id'>$item->name</option>";
        }
        return self::dropdownFilter("Category", "category", $options);
    }

    public static function report_status(): string
    {
        $data = Status::all();
        $options = "<option value='all'>All</option>";
        foreach ($data as $item){
            $options .= "<option value='$item->id'>$item->name</option>";
        }
        return self::dropdownFilter("Status", "report_status", $options);
    }

    public static function entry_type(): string
    {

        $options = "<option value='all'>All</option>";
        $options .= "<option value='".Income::ENTRY_TYPE_MANUAL."'>Manual</option>";
        $options .= "<option value='".Income::ENTRY_TYPE_PHOTO."'>Photo</option>";
        $options .= "<option value='".Income::ENTRY_TYPE_INVOICE."'>Invoice</option>";
        return self::dropdownFilter("Entry type", "entry_type", $options);
    }

    public static function check($key): bool
    {
        $value = request()->get($key);
        return $value && strlen($value) > 0 && $value != "all";
    }
}
