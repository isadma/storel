<?php

namespace App\Helpers;

class Datatable
{
    public static array $colors = [
        "primary",
        "success",
        "info",
        "warning",
        "danger",
        "dark",
    ];

    public static function getColor(): string
    {
        return self::$colors[rand(0, count(self::$colors) - 1)];
    }

    public static function text($text): string
    {
        return "<td>$text</td>";
    }

    public static function simpleLabel($text): string
    {
        return '<td><div class="badge badge-light fw-bold">'.$text.'</div></td>';
    }

    public static function image($url): string
    {
        return '<td><img src="'.$url.'" style="height:75px; width: auto;" alt="image"></td>';
    }

    public static function label($text, $color): string
    {
        if (!$color){
            $color = "success";
        }
        return '<td> <div class="badge badge-light-'.$color.' fw-bold">'.$text.'</div> </td>';
    }

    public static function customColorLabel($text, $color): string
    {
        return '<td> <div class="badge badge-light-success fw-bold" style="background-color: '.$color.' !important; color: white !important;">'.$text.'</div> </td>';
    }

    public static function labelYesNo($value): string
    {
        $color = "success";
        $text = "Yes";
        if (!$value){
            $color = "danger";
            $text = "No";
        }
        return '<td> <div class="badge badge-light-'.$color.' fw-bold">'.$text.'</div> </td>';
    }

    public static function imageTitleDescription($title, $description, $image = null, $url = null): string
    {
        if (!$url){
            $url = "javascript:void(0)";
        }
        if ($image){
            $avatar = '
                <div class="symbol symbol-50px me-3">
				    <img src="'.$image.'" alt="'.$title.'">
                </div>
            ';
        }
        else{
            $color = self::getColor();
            $firstCharacter = strtoupper(substr($title, 0, 1));
            $avatar = '<div class="symbol-label fs-3 bg-light-'.$color.' text-'.$color.'">'.$firstCharacter.'</div>';
        }
        return '
            <td>
                <div class="d-flex align-items-center">
                    '.$avatar.'
                    <div class="d-flex justify-content-start flex-column">
                        <a href="'.$url.'" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">
                            '.$title.'
                        </a>
                        <span class="text-gray-400 fw-semibold d-block fs-7">'.$description.'</span>
                    </div>
                </div>
            </td>
        ';
    }

    public static function imageTitle($title, $image = null, $url = null): string
    {
        if (!$url){
            $url = "javascript:void(0)";
        }
        if ($image){
            $avatar = '
                <div class="symbol-label">
				    <img src="'.$image.'" alt="'.$title.'" class="w-100">
                </div>
            ';
        }
        else{
            $color = self::getColor();
            $firstCharacter = strtoupper(substr($title, 0, 1));
            $avatar = '<div class="symbol-label fs-3 bg-light-'.$color.' text-'.$color.'">'.$firstCharacter.'</div>';
        }
        return '
            <td class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <a href="'.$url.'">
                        '.$avatar.'
                    </a>
                </div>
                <div class="d-flex flex-column">
                    <a href="'.$url.'" class="text-gray-800 text-hover-primary mb-1">
                        '.$title.'
                    </a>
                </div>
            </td>
        ';
    }

    public static function titleDescription($title, $description, $url = null): string
    {
        if (!$url){
            $url = "javascript:void(0)";
        }
        return '
            <td class="align-items-center">
                <div class="d-flex flex-column">
                    <a href="'.$url.'" class="text-gray-800 text-hover-primary mb-1">
                        '.$title.'
                    </a>
                    <span>'.$description.'</span>
                </div>
            </td>
        ';
    }

    public static function actions($actions): string
    {
        $show = "";
        $edit = "";
        $editModal = "";
        $delete = "";
        foreach ($actions as $action){
            if ($action["component"] == "show"){
                $show = self::getShowAction($action["url"]);
            }
            elseif ($action["component"] == "editSimple"){
                $edit = self::getEditSimpleAction($action["url"]);
            }
            elseif ($action["component"] == "editForm"){
                $resp = self::getEditFormAction($action["form"]);
                $edit = $resp["edit"];
                $editModal = $resp["modal"];
            }
            elseif ($action["component"] == "delete"){
                $delete = self::getDeleteAction($action["url"]);
            }
        }
        return '
            <td class="text-end">
                <a href="javascript:void(0)" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    Actions
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                    <span class="svg-icon svg-icon-5 m-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                    '.$show.'
                    '.$edit.'
                    '.$delete.'
                </div>
                <!--end::Menu-->
                '.$editModal.'
            </td>
        ';
    }

    private static function getShowAction($url): string
    {
        return '
            <div class="menu-item px-3">
                <a href="'.$url.'" class="menu-link px-3">Show</a>
            </div>
        ';
    }

    private static function getEditSimpleAction($url): string
    {
        return '
            <div class="menu-item px-3">
                <a href="'.$url.'" class="menu-link px-3">Edit</a>
            </div>
        ';
    }

    private static function getEditFormAction($form): array
    {
        $unique = uniqid();
        return [
            "edit" => '
                <div class="menu-item px-3">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#edit_'.$unique.'" data-bs-toggle="modal" data-bs-target="#edit_'.$unique.'" class="menu-link px-3">Edit</a>
                </div>
            ',
            "modal" => '
                <div class="text-start modal fade" id="edit_'.$unique.'" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="edit_'.$unique.'_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Edit</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                '.$form.'
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
            '
        ];
    }

    public static function getDeleteAction($url): string
    {
        $csrf = csrf_field();
        $method = method_field("DELETE");
        $confirmText = "'Are you sure to delete this record?'";
        return '
            <div class="menu-item px-3">
                <form action="'.$url.'" method="POST">
                    '.$csrf . $method.'
                    <a href="javascript:void(0)" onclick="if (confirm('.$confirmText.')) {this.parentElement.submit();}" class="menu-link px-3" >
                        Delete
                    </a>
                </form>
            </div>
        ';
    }

    public static function getDatatableColumns($items): array
    {
        $columns = [];
        foreach ($items as $item){
            $columns[] = [
                "data" => $item,
                "name" => $item,
                "searchable" => false,
                "orderable" => false
            ];
        }
        return $columns;
    }

}
