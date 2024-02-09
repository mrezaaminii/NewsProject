<?php

namespace mam\Share\Contract;

interface ShareRepositoryInterface
{
    public static function alertMessage(string $title,string $body);

    public static function makeSlug(string $title);
}
