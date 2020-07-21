<?php

class Gallery {
	
    # Path to image folder
    private $imageFolder = './Gallery/';

    # Show only these file types from the image folder
    private $imageTypes = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';
    private $extensions = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');

    # Set to true if you prefer sorting images by name

    # If set to false, images will be sorted by date
    private $sortByImageName = false;

    # Set to false if you want the oldest images to appear first
    # This is only used if images are sorted by date (see above)
    private $newestImagesFirst = true;


    public function __construct() {
        $this->allowCors();
    }

    /**
     * Opens up CORS access
     */
    private function allowCors() {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit(0);
        }
    }

    # Return list of images in folder
    /**
     * get uploaded files
     *
     * @return json
     * [filemtime]=> image name
     */
    public function listImages() {
        # Add images to array
        $images = glob($this->imageFolder . $this->imageTypes, GLOB_BRACE);


        # Sort images
        if ($this->sortByImageName) {
            $sortedImages = $images;
            natsort($sortedImages);
        } else {
            # Sort the images based on its 'last modified' time stamp
            $sortedImages = array();
            $count = count($images);
            for ($i = 0; $i < $count; $i++) {
                $sortedImages[date('YmdHis', filemtime($images[$i])) . $i] = $images[$i];
            }
            # Sort images in array
            if ($this->newestImagesFirst) {
                krsort($sortedImages);
            } else {
                ksort($sortedImages);
            }
        }
		//print_r($sortedImages); exit(0);
        //return $this->response(200, $sortedImages);
        return $sortedImages;
    }
    
    /**
     * Sets json output response
     *
     * @param  int    $status
     * @param  array  $data
     */
    private function response(int $status, array $data) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit(0);
    }
    
    /**
    * Handles file upload process
    * @param $_FILES
    * @return array
    */
    public function uploadImage($files){
        
        $errors = array();
        
        try {
                        
            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($_FILES['photo']['error']) ||
                is_array($_FILES['photo']['error'])
            ) {
                $errors[] = $this->handleUploadError(9);
            }
            
            // Check $_FILES['photo']['error'] value.
            $checkErrorValue = $this->handleUploadError($_FILES['photo']['error']);
            if(!empty($checkErrorValue)){
                $errors[] = $checkErrorValue;
            }
            
            // Check MIME Type by yourself.
            $checkMimeType = $this->checkMimeType($_FILES);
            if(!empty($checkMimeType)){
                $errors[] = $checkMimeType;
            }
            
            // Check file size
            $checkFileSize = $this->checkFileSize($_FILES);
            if(!empty($checkFileSize)) {
                $errors[] = $checkFileSize;
            }
            
            // Check if file already exists
            if(file_exists(realpath($this->imageFolder). '/' . $_FILES['photo']['name']) == TRUE) {
                $errors[] = $_FILES['photo']['name'] . ' already exists';
            }
            
            // check if any error found
            // if no error then upload the file
            if(empty($errors)) {
                if(!move_uploaded_file($_FILES['photo']['tmp_name'], $this->imageFolder.$_FILES['photo']['name'])) {
                    $errors[] = 'Failed to move uploaded file';
                }
            }
        
        } catch(Exception $e) {
            $errors[] = $e->getMessage();
        }
        
        return $errors;
    }
    
    /**
     * Formats an error response
     *
     * @param  int $uploadError
     */
    private function handleUploadError(int $uploadError) {
        if ($uploadError === 0) {
            return '';
        }

        switch ($uploadError) {
            case 1:
                $message = 'The uploaded file exceeds the max filesize';
                break;
            case 2:
                $message = 'The uploaded file exceeds the max filesize';
                break;
            case 3:
                $message = 'The file was only partially uploaded.';
                break;
            case 4:
                $message = 'No file was uploaded.';
                break;
            case 6:
                $message = 'Missing a temporary folder.';
                break;
            case 7:
                $message = 'Failed to write file to disk.';
                break;
            case 8:
                $message = 'Only image files are allowed';
            case 9:
                $message = 'Invalid parameters';
            case 10:
                $message = 'Unknown error';
        }
        return $message;
    }


    /**
    * Check image mime type
    * @param $_FILES array
    * @return array
    */
    private function checkMimeType($file){
        $tmpName = $file['photo']['tmp_name'];
        $fileName = $file['photo']['name'];
        $fileType = $file['photo']['type'];
        
        
        $info = getimagesize($tmpName);
        if (!in_array($info['mime'], $this->extensions) ) {
            return 'Extension not allowed: ' . $fileName . ' ' . $fileType;
        }
        return '';
    }
    
    /**
    * Check file size
    * @param $_FILES
    * @return array
    */
    
    private function checkFileSize($file) {
        if ($file['photo']['size'] > 2097152) {
             return 'File size must not be more then 2MB';
        }
        return '';
    }
    
    public function getImageById($id) {
        $images = $this->listImages();   
        //print_r($images);
        if(array_key_exists($id, $images)) {
            return $images[$id];
        }
        return '';
    }
    
    public function saveFilteredImage($data){
        return '';
    }

}