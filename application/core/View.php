<?php

/**
 * Class View
 */
class View {

    protected $data;

    protected $assetsFiles = array();

    public function __construct()
    {
        $assetsFiles = array(
            'css' => array(
//                'enter names of css files, that you want include in some page (without extension)',
            ),
            'js' => array(
//                'enter names of js files, that you want include in some page (without extension)',
            ),
        );

        $this->assetsFiles = $this->registerAssets($assetsFiles);
    }

    /**
     * Include js and css files to your project
     *
     * @param array $assets - array with names of css and js files
     *
     * @return string - html string of scripts (js) and links (css)
     */
    public function registerAssets($assets = array())
    {
        $default = array(
            'css' => array(
                'style',
            ),
            'js' => array(
                'jquery-1.6.2',
            ),
        );

        if(empty($assets)) {

            $assets = $default;
        } else {
            $assets['css'] = array_merge($assets['css'], $default['css']);
            $assets['js'] = array_merge($assets['js'], $default['js']);
            $assets['css'] = array_unique($assets['css']);
            $assets['js'] = array_unique($assets['js']);

        }

        $assetsHtmlString = '';

        if(array_key_exists('css', $assets) && count($assets['css']) > 0) {
            foreach($assets['css'] as $name) {
                $assetsHtmlString .= '<link rel="stylesheet" href="'.CSS_DIR.'/'.$name.'.css" type="text/css">';
            }
        }

        if(array_key_exists('js', $assets) && count($assets['js']) > 0) {
            foreach($assets['js'] as $name) {
                $assetsHtmlString .= '<script type="text/javascript" src="'.JS_DIR.'/'.$name.'.js"></script>';
            }
        }

        return $assetsHtmlString;
    }

    /**
     *
     *
     * @param $contentView - content template
     * @param $templateView - basic template (header, footer, etc)
     * @param array $data - array of data, that will be passed to template
     */
    public function render($contentView, $templateView, $data = array())
    {
        $this->data = $data;

        $this->assetsFiles = $this->registerAssets($data['assetsFiles']);

        include 'application/'.TEMPLATES_DIR.'/'.$templateView.'.php';
    }

    /**
     * include header.php template
     */
    public function getHeader()
    {
        include_once BASIC_PATH.'/'.TEMPLATES_DIR.'/header.php';
    }

    /**
     * include footer.php template
     */
    public function getFooter()
    {
        include_once BASIC_PATH.'/'.TEMPLATES_DIR.'/footer.php';
    }

    /**
     * include {$templateName}.php template
     */
    public function getContent($templateName)
    {
        include_once BASIC_PATH.'/'.TEMPLATES_DIR.'/'.$templateName.'.php';
    }

    /**
     * get home page url
     *
     * @return string
     */
    public function homeUrl() {
        return SITE_URL;
    }
}

