<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Html{
    var $dir;        //dir for the htmls(without/)
    var $rootdir;    //root of html files(without/):html
    var $name;       //html文件存放路径
    var $dirname;    //指定的文件夹名称
    var $url;        //获取html文件信息的来源网页地址
    var $time;       //html文件信息填加时的时间
    var $dirtype;    //目录存放方式:year,month,,,,
    var $nametype;   //html文件命名方式:name

    function setvar($nametype='name',$dirtype='year',$rootdir='html')
    {
        $this->rootdir=$rootdir;
        $this->dirtype=$dirtype;
        $this->nametype=$nametype;
    }
    
    function createdir($dir = '')
    {
        $this->dir = $dir?$dir:$this->dir;
        
        if (!is_dir($this->dir)){
            $temp = explode('/', $this->dir);
            $cur_dir = '';
            for($i = 0;$i < count($temp);$i++)
            {
                $cur_dir .= $temp[$i] . '/';
                if (!is_dir($cur_dir))
                {
                    @mkdir($cur_dir, 0777);
                }
            }
        }
    }
    
    function getdir($dirname = '', $time = 0)
    {
        $this->time = $time?$time:$this->time;
        $this->dirname = $dirname?$dirname:$this->dirname;
        
        switch($this->dirtype)
        {
	        case 'name':
	            if(empty($this->dirname))
	                $this->dir = $this->rootdir;
	            else
	                $this->dir = $this->rootdir . '/' . $this->dirname;
	            break;
	        case 'year':
	            $this->dir = $this->rootdir . '/' . date("Y", $this->time);
	            break;
	        
	        case 'month':
	            $this->dir = $this->rootdir . '/' . date("Y-m", $this->time);
	            break;
	        
	        case 'day':
	            $this->dir = $this->rootdir . '/' . date("Y-m-d", $this->time);
	            break;
        }
        
        $this->createdir();
        
        return $this->dir;
    }
    
    function geturlname($url = '')
    {
        $this->url = $url?$url:$this->url;
        
        $filename = basename($this->url);
        $filename = explode(".", $filename);
        return $filename[0];
    }
    
    function geturlquery($url = '')
    {
        $this->url = $url?$url:$this->url;
        
        $durl = parse_url($this->url);
        $durl = explode("&", $durl[query]);
        foreach($durl as $surl)
        {
            $gurl = explode("=", $surl);
            $eurl[] = $gurl[1];
        }
        return join("_", $eurl);
    }
    
    function getname($url = '', $time = 0, $dirname = '')
    {
        $this->url = $url?$url:$this->url;
        $this->dirname = $dirname?$dirname:$this->dirname;
        $this->time = $time?$time:$this->time;
        
        $this->getdir();
        
        switch($this->nametype)
        {
	        case 'name':
	            $filename = $this->geturlname() . '.html';
	            $this->name = $this->dir . '/' . $filename;
	            break;
	        
	        case 'time':
	            $this->name = $this->dir . '/' . $this->time . '.html';
	            break;
	        
	        case 'query':
	            $this->name = $this->dir . '/' . $this->geturlquery() . '.html';
	            break;
	        
	        case 'namequery':
	            $this->name = $this->dir . '/' . $this->geturlname() . '-' . $this->geturlquery() . '.html';
	            break;
	        
	        case 'nametime':
	            $this->name = $this->dir . '/' . $this->geturlname() . '-' . $this->time . '.html';
	            break;

            default:
                $filename = $this->geturlname() . '.html';
                $this->name = $this->dir . '/' . $filename;
                break;
            
        }
        return $this->name;
    }
    
    function createhtml($url = '', $time = 0, $dirname = '', $htmlname = '')
    {
        $this->url = $url?$url:$this->url;
        $this->dirname = $dirname?$dirname:$this->dirname;
        $this->time = $time?$time:$this->time;
        // 上面保证不重复地把变量赋予该类成员
        if(empty($htmlname))
            $this->name = $dirname . $this->getname();
        else
            $this->name = $dirname . '/' . $htmlname; //得到name 

        $content = file($this->url) or die("Failed to open the url " . $this->url . " !");;
        
        // /////////////关键步---用file读取$this->url
        
        $content = join("", $content);
        $fp = @fopen($this->name, "w") or die("Failed to open the file " . $this->name . " !");

        $bResult = @fwrite($fp, $content);
        fclose($fp);
        if($bResult)
            return true;
        else
            return false;

    }
    // ///////////////以name为名字生成html
    function deletehtml($url = '', $time = 0, $dirname = '')
    {
        $this->url = $url?$url:$this->url;
        $this->time = $time?$time:$this->time;
        
        $this->getname();
        
        if(@unlink($this->name))
            return true;
        else
            return false;
    }
    
    /**
     * function::deletedir() 
     * 删除目录
     * 
     * @param $file 目录名(不带/)
     * @return 
     */
    function deletedir($file)
    {
        if(file_exists($file))
        {
            if(is_dir($file))
            {
                $handle = opendir($file);
                while(false !== ($filename = readdir($handle)))
                {
                    if($filename != "." && $filename != "..")
                        $this->deletedir($file . "/" . $filename);
                }
                closedir($handle);
                rmdir($file);
                return true;
            }else{
                unlink($file);
            }
        }
    }
    
}