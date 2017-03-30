<?php
/**
 * This is a class for several type of image manipulation.
 *
 * @package shahreare\ImageSolution
 * @class Imagesolution
 * @version 1.0.0
 * @author A H M Reza Shahreare Khan, www.shahreare.me
 */
namespace Shahreare\ImageSolution;

class ImageSolution {
	protected $filename;
	protected $dimX;
	protected $dimY;
	protected $filetype;

	function __construct($file) {
		$this->filename = $file;

		$resulation = getimagesize($file);
		$this->dimX = $resulation[0];
		$this->dimY = $resulation[1];

		$this->filetype = pathinfo($file);
	}

	function getFilename() {
		return $this->filename;
	}

	function setFilename($filename) {
		$this->filename = $filename;
	}

	function getFileType() {
		return $this->filetype['extension'];
	}

	function setFileType() {
		$this->filetype = pathinfo($this->filename);
	}

	function getDim() {
		return array('width' => $this->dimX, 'height' => $this->dimY);
	}
	function setDim($width, $height) {
		$this->dimX = $width;
		$this->dimY = $height;
	}

	function convertToPNG() {
		$img = imagecreatefromstring(file_get_contents($this->filename));
		$save = imagepng($img, $this->filetype['dirname'] . '/' . $this->filetype['filename'] . '.png');

		if ($save) {
			unlink($this->filename);
			$this->setFilename($this->filetype['dirname'] . '/' . $this->filetype['filename'] . '.png');
			$this->setFileType();
		}
	}

	function convertToJPG() {
		$img = imagecreatefromstring(file_get_contents($this->filename));
		$save = imagejpeg($img, $this->filetype['dirname'] . '/' . $this->filetype['filename'] . '.jpg');
		if ($save) {
			unlink($this->filename);
			$this->setFilename($this->filetype['dirname'] . '/' . $this->filetype['filename'] . '.jpg');
			$this->setFileType();
		}
	}

	function convertToGIF() {
		$img = imagecreatefromstring(file_get_contents($this->filename));
		$save = imagegif($img, $this->filetype['dirname'] . '/' . $this->filetype['filename'] . '.gif');
		if ($save) {
			unlink($this->filename);
			$this->setFilename($this->filetype['dirname'] . '/' . $this->filetype['filename'] . '.gif');
			$this->setFileType();
		}
	}

	function resize($width, $height, $aspect_ratio = null) {
		if ($aspect_ratio) {
			if ($this->dimX / $this->dimY < $width / $height) {
				$width = round(($this->dimX / $this->dimY) * $height);
			} else if ($this->dimX / $this->dimY > $width / $height) {
				$height = round($this->dimY * $width / $this->dimX);
			}
		}

		$dst = imagecreatetruecolor($width, $height);
		if ($this->filetype['extension'] == 'jpg') {
			$src = imagecreatefromjpeg($this->filename);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $this->dimX, $this->dimY);
			//unlink($this->filename);
			$save = imagejpeg($dst, $this->filetype['dirname'] . '/' . $this->filetype['filename'] . '_temp.jpg');
			if ($save) {
				unlink($this->filename);
				rename($this->filetype['dirname'] . '/' . $this->filetype['filename'] . '_temp.jpg', $this->filename);
			}
		} else if ($this->filetype['extension'] == 'png') {
			$src = imagecreatefrompng($this->filename);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $this->dimX, $this->dimY);
			//unlink($this->filename);
			$save = imagepng($dst, $this->filetype['dirname'] . '/' . $this->filetype['filename'] . '_temp.png');
			if ($save) {
				unlink($this->filename);
				rename($this->filetype['dirname'] . '/' . $this->filetype['filename'] . '_temp.png', $this->filename);
			}
		} else if ($this->filetype['extension'] == 'gif') {
			$src = imagecreatefromgif($this->filename);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $this->dimX, $this->dimY);
			//unlink($this->filename);
			$save = imagegif($dst, $this->filetype['dirname'] . '/' . $this->filetype['filename'] . '_temp.gif');
			if ($save) {
				unlink($this->filename);
				rename($this->filetype['dirname'] . '/' . $this->filetype['filename'] . '_temp.gif', $this->filename);
			}
		}

		$this->setDim($width, $height);
	}

	public function fitToWidth($width) {
		$height = round($this->dimY * $width / $this->dimX);
		return $this->resize($width, $height);
	}
	public function fitToHeight($height) {
		$width = round(($this->dimX / $this->dimY) * $height);
		return $this->resize($width, $height);
	}
	public function thumbnail($dim = 100) {
		return $this->resize($dim, $dim);
	}
	public function rename($newName) {
		rename($this->filename, $this->filetype['dirname'] . '/' . $newName . "." . $this->filetype['extension']);
		$this->setFilename($newName);
		return true;

	}

	public function copyImage($newName) {
		return copy($this->filename, $this->filetype['dirname'] . '/' . $newName . "." . $this->filetype['extension']);
	}

}
?>
