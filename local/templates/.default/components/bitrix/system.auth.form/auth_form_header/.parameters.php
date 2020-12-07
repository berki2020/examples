<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arTemplateParameters = [
    "AUTH_LOGOUT_URL" => [
        "NAME" => getMessage('AUTH_LOGOUT_URL'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ],
    "AUTH_LOGIN_URL" => [
        "NAME" => getMessage('AUTH_LOGIN_URL'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ],
    "PERSONAL_URL" => [
        "NAME" => getMessage('PERSONAL_URL'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ],
];