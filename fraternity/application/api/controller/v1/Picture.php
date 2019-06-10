<?php
namespace app\api\controller\v1;

use think\Controller;
// use app\api\model\picture as PictureModel;
use app\api\service\Picture as PictureService;
class Picture 
{
    public function getPicture()
    {
        return PictureService::getPicture();
    }
}