<?php

namespace mam\Share\Repositories;

use mam\Home\Repositories\BaseRepository;
use mam\Share\Contract\ShareRepositoryInterface;

class ShareRepository extends BaseRepository implements ShareRepositoryInterface
{

    public static function alertMessage(string $title, string $body = 'با موفقیت انجام شد')
    {
        return alert()->success($title,$body);
    }

    public static function makeSlug(string $title): array|string|null
    {
        $title = str_replace('_','',$title);
        return preg_replace('/\s/','-',$title);
    }
}
