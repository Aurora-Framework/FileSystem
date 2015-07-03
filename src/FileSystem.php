<?php

namespace Aurora;

use FilesystemIterator;
use SplFileObject;

class FileSystem
{
	public static function exists($path)
	{
		return file_exists($path);
	}

	public static function isFile($file)
	{
		return is_file($file);
	}

	public static function isDirectory($directory)
	{
		return is_dir($directory);
	}

	public static function isDirectoryEmpty($path)
	{
		$files = scandir($path);
		foreach ($files as $file) {
	   	if ($file !== '.' && $file !== '..') {
				return false;
			}
 		}

 		return true;
	}

	public static function isReadable($file)
	{
		return is_readable($file);
	}

	public static function isWritable($file)
	{
		return is_writable($file);
	}

	public static function lastModified($file)
	{
		return filemtime($file);
	}

	public static function size($file)
	{
		return filesize($file);
	}

	public static function extension($file)
	{
		return pathinfo($file, PATHINFO_EXTENSION);
	}

   public static function mime($file, $guess = true)
	{
		if (function_exists('finfo_open')) {
   		// Get mime using the file information functions
   		$info = finfo_open(FILEINFO_MIME_TYPE);
   		$mime = finfo_file($info, $file);
   		finfo_close($info);
   		return $mime;
		}
		return false;
	}

	public static function delete($file)
	{
		return unlink($file);
	}

   public static function deleteDirectory($path)
	{
		$iterator = new FilesystemIterator($path);
		foreach ($iterator as $item) {
	   	if ($item->isDir()) {
				$this->deleteDirectory($item->getPathname());
	   	} else {
		   	$this->delete($item->getPathname());
	   	}
		}

		return rmdir($path);
	}

   public static function glob($pattern, $flags = 0)
	{
		return glob($pattern, $flags);
	}

   public static function getContents($file)
	{
		return file_get_contents($file);
	}

   public static function putContent($file, $data, $lock = false)
	{
		return file_put_contents($file, $data, $lock ? LOCK_EX : 0);
	}

   public static function prependContent($file, $data, $lock = false)
	{
		return file_put_contents($file, $data . file_get_contents($file), $lock ? LOCK_EX : 0);
	}

   public static function appendContent($file, $data, $lock = false)
	{
		return file_put_contents($file, $data,  $lock ? FILE_APPEND | LOCK_EX : FILE_APPEND);
	}

   public static function truncateContents($file, $lock = false)
	{
		return (0 === file_put_contents($file, null, $lock ? LOCK_EX : 0));
	}

   public static function createDirectory($path, $mode = 0777, $recursive = false)
	{
		return mkdir($path, $mode, $recursive);
	}

   public static function includeFile($file)
	{
		return include $file;
	}

   public static function includeFileOnce($file)
	{
		return include_once $file;
	}

   public static function requireFile($file)
	{
		return require $file;
	}

   public static function requireFileOnce($file)
	{
		return require_once $file;
	}

   public static function file($file, $openMode = 'r', $useIncludePath = false)
	{
		return new SplFileObject($file, $openMode, $useIncludePath);
	}
}
