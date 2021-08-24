<?php

namespace Blankqwq\Mirai\Message\MessageType;

class MQ
{
    public static function MQ($type, $value = NULL)
    {
        $code = '[mirai:' . $type;
        if ($value) {
            $code .= (':' . is_array($value) ? implode(",", $value) : $value);
        }
        $code .= ']';
        return $code;
    }

    /**
     * @param $qq
     * @return string
     * @xxx
     */
    public static function At($qq): string
    {
        return self::MQ('at', $qq);
    }

    /**
     * @param $qq
     * @return string
     * @全体
     */
    public static function AtALL($qq): string
    {
        return self::MQ('atall');
    }

    /**
     * @param $id
     * @return string
     * 闪照
     */
    public static function FlashImage($id): string
    {
        return self::MQ('flash', $id);
    }

    /**
     * @param $id
     * @return string
     * 原生表情
     */
    public static function Face($id): string
    {
        return self::MQ('face', $id);
    }

    /**
     * @param $name
     * @param $pokeType
     * @param $id
     * @return string
     * 搓一搓
     */
    public static function PokeMessage($name, $pokeType, $id): string
    {
        return self::MQ('poke', [
            $name, $pokeType, $id
        ]);
    }

    /**
     * @param $id
     * @param $name
     * @param $count
     * @return string
     * VIP表情
     */
    public static function VipFace($id, $name, $count): string
    {
        return self::CQ('vipface', [
            $id, $name, $count
        ]);
    }

    /**
     * @param $content
     * @return string
     * 小程序
     */
    public static function LightApp($content): string
    {
        return self::CQ('app', $content);
    }

    /**
     * @param $serviceId
     * @param $content
     * @return string
     * 服务信息
     */
    public static function SimpleServiceMessage($serviceId, $content): string
    {
        return self::CQ('service',
            [$serviceId, $content]);
    }

    /**
     * @param $value
     * @return string
     * 魔法表情骰子
     */
    public static function Dice($value): string
    {
        return self::MQ('dice', $value);
    }

    /**
     * @param $args
     * @return string
     * 音乐分享
     */
    public static function MusicShare($args): string
    {
        return self::MQ('musicshare', $args);
    }

    /**
     * @param $id
     * @param $internalId
     * @param $name
     * @param $size
     * @return string
     * 文件分享
     */
    public static function FileMessage($id, $internalId, $name, $size): string
    {
        return self::MQ('file', [
            $id, $internalId, $name, $size
        ]);
    }
}