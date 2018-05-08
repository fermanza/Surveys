<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Matriphe\Imageupload\ImageuploadModel;

class Image extends ImageuploadModel
{
	protected $table = 'images';
}
