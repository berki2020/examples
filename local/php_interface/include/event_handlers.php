<?

if (!defined ("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

AddEventHandler("main", "OnAfterUserAuthorize", Array("AuthUserMessage", "OnAfterUserAuthorizeHandler"));

class AuthUserMessage
{
    public static function OnAfterUserAuthorizeHandler($arUser)
    {
        $arEventFields = [
            "EMAIL" => $arUser["user_fields"]["EMAIL"],
            "LOGIN" => $arUser["user_fields"]['LOGIN'],
            "AUTH_TIME" => date('Y.d.m H:i:s')
        ];

        CEvent::Send("USER_AUTHORIZATION", SITE_ID, $arEventFields);
    }
}
