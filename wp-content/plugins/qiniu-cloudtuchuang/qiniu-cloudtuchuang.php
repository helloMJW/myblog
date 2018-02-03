<?php
/*
Plugin Name: 七牛云图床
Plugin URI:  http://www.75271.com/2954.html
Description:  七牛云图床插件：在编辑器页面上传图片至七牛云对象存储
Author: 开心洋葱
Author URI: http://www.75271.com
Version: 1.8
*/

define('QINIUYUN_PLUGIN_URL', plugins_url('', __FILE__));
define('QINIUYUN_PLUGIN_DIR', plugin_dir_path(__FILE__));


   
// filters
add_filter( 'wp_handle_upload', 'qiniucloudtuchuang_handle_upload_files'  );

 function qiniucloudtuchuang_handle_upload_files( $file ) {

        $script_filename = isset( $_SERVER['SCRIPT_FILENAME'] ) ? $_SERVER['SCRIPT_FILENAME'] : '';

         if ( is_admin() )
             $is_admin = true;
         else
             $is_admin = false;

        // admin
        if ( $is_admin === true ) {
                add_filter( 'wp_generate_attachment_metadata', 'qiniucloudtuchuang_syn_qiniu_media' , 10, 2 );
        // frontend
        } else {
                add_filter( 'wp_generate_attachment_metadata', 'qiniucloudtuchuang_syn_qiniu_media' , 10, 2 );
        }


    return $file;
}


 function qiniucloudtuchuang_syn_qiniu_media( $data, $attachment_id, $method = '' ) {

    require QINIUYUN_PLUGIN_DIR.'vendor/autoload.php';

    $post = get_post( (int) $attachment_id );
    $post_id = ( ! empty( $post ) ? (int) $post->post_parent : 0 );

    $upload_dir = wp_upload_dir();

    // is this really an image?
    if ( getimagesize( $upload_dir['basedir'] . DIRECTORY_SEPARATOR . $data['file'] ) !== false ) {

        $options = get_option('qiniu_options');
        $host = $options['host'];
        $bucket = $options['bucket'];
        $prefix = $options['prefix'];
        $accessKey = $options['accesskey'];
        $secretKey = $options['secretkey'];

        $auth = new Qiniu\Auth($accessKey, $secretKey);
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new Qiniu\Storage\UploadManager();
		$path_spil = '/';//DIRECTORY_SEPARATOR;
        if(!$prefix){

            $prefix_up = str_replace(ABSPATH,"",$upload_dir['basedir'] .  $path_spil . $data['file']);
			$prefix_up = str_replace('\\',"/",$prefix_up);
            $uploadMgr->putFile($token,$prefix_up,$upload_dir['basedir'] . $path_spil . $data['file']);

            if ( ! empty( $data['sizes'] ) ){
                foreach($data['sizes'] as $image_size => $value){
                    $filepath = $upload_dir['basedir'] . $path_spil . dirname( $data['file'] ) . $path_spil . $data['sizes'][$image_size]['file'];
                    $prefix_up = str_replace(ABSPATH,"",$filepath);
                    $uploadMgr->putFile($token,$prefix_up,$filepath);

                }

            }

        }else{
            $prefix_up = $prefix  . $data['file'];
			$prefix_up = str_replace('\\',"/",$prefix_up);
            $uploadMgr->putFile($token,$prefix_up,$upload_dir['basedir'] . $path_spil . $data['file']);

            if ( ! empty( $data['sizes'] ) ){
                foreach($data['sizes'] as $image_size => $value){
                    $filepath = $upload_dir['basedir'] . $path_spil . dirname( $data['file'] ) . $path_spil . $data['sizes'][$image_size]['file'];
                    $prefix_up = $prefix.$data['sizes'][$image_size]['file'];
                    $uploadMgr->putFile($token,$prefix_up,$filepath);

                }

            }
        }


    }

    return $data;
}


//设置菜单
function qiniu_cloudtuchuang_menu(){
    add_options_page('qiniu', '七牛云图床', 'manage_options', 'qiniu-tuchaung', 'qiniu_cloudtuchuang_options');
}
add_action('admin_menu', 'qiniu_cloudtuchuang_menu');

function qiniu_cloudtuchuang_options(){
?>  
    <h1>七牛云图床设置</h1>
    <form method="post" action="options.php">
    <?php 
     settings_fields( 'qiniu_options');
     do_settings_sections( 'qiniu-settings' );
     ?>
	<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
	</form>
<?php 
}

add_action('admin_init', 'register_qiniucloudtuchuang_settings');

function register_qiniucloudtuchuang_settings() {
	register_setting('qiniu_options', 'qiniu_options');
	add_settings_section('qiniu_defaults', '默认设置', 'qiniucloudtuchuang_defaults_output', 'qiniu-settings');
	add_settings_field('qiniu-tuchaung-host', '七牛绑定域名', 'qiniucloudtuchuang_host_output', 'qiniu-settings','qiniu_defaults');
    add_settings_field('qiniu-tuchaung-hostprefix', '前缀', 'qiniucloudtuchuang_prefix_output', 'qiniu-settings','qiniu_defaults');
    add_settings_field('qiniu-tuchaung-synmedia', '是否同步上传', 'qiniucloudtuchuang_synmedia_output', 'qiniu-settings','qiniu_defaults');
	add_settings_field('qiniu-tuchaung-hostbucket', 'bucket', 'qiniucloudtuchuang_bucket_output', 'qiniu-settings','qiniu_defaults');
	add_settings_field('qiniu-tuchaung-hostimgurl', '图片链接形式', 'qiniucloudtuchuang_imgurl_output', 'qiniu-settings','qiniu_defaults');
	add_settings_field('qiniu-tuchaung-hostaccesskey', 'AccessKey', 'qiniucloudtuchuang_accesskey_output', 'qiniu-settings','qiniu_defaults');
	add_settings_field('qiniu-tuchaung-hostsecretkey', 'SecretKey', 'qiniucloudtuchuang_secretkey_output', 'qiniu-settings','qiniu_defaults');
}

function qiniucloudtuchuang_defaults_output(){

}

function qiniucloudtuchuang_host_output() {
	$options = get_option('qiniu_options');
	echo "<input id='host' name='qiniu_options[host]' size='50' type='text' value='{$options['host']}' />";
    echo "<div>设置为你在七牛绑定的域名,没绑定则填写七牛域名<br />仅作显示图片的链接使用,注意要域名前面要加上<strong>  http:// </strong></div>";
}
function qiniucloudtuchuang_prefix_output() {
	$options = get_option('qiniu_options');
	echo "<input id='prefix' name='qiniu_options[prefix]' size='50' type='text' value='{$options['prefix']}' />";
	echo "<div>如果你想像七牛一样在上传的图片前加前缀则填写<br />例如:<strong>img</strong>,多个前缀:<strong>img/2017</strong>,不想则留空<br/>添加前缀后图片的链接类似于：七牛绑定域名/前缀/图片名称 </div>";

}
function qiniucloudtuchuang_synmedia_output() {
    $options = get_option('qiniu_options');
    if($options['synmedia']) { $checked = ' checked="checked" '; } else { $checked = ''; }
    echo "<input ".$checked." id='synmedia' name='qiniu_options[synmedia]' type='checkbox' />";
    echo "<div>选择后,默认上传图片时会自动把图片同步到七牛云存储上<br/>如果有前缀会按照前缀存储,否则按照上传路径存储,不选则不会自动同步</div>";
}
function qiniucloudtuchuang_bucket_output() {
	$options = get_option('qiniu_options');
	echo "<input id='bucket' name='qiniu_options[bucket]' size='50' type='text' value='{$options['bucket']}' />";
}
function qiniucloudtuchuang_accesskey_output() {
	$options = get_option('qiniu_options');
	echo "<input id='accesskey' name='qiniu_options[accesskey]' size='50' type='text' value='{$options['accesskey']}' />";
    echo "<div>在七牛帐号-密钥中查看</div>";
}
function qiniucloudtuchuang_secretkey_output() {
	$options = get_option('qiniu_options');
	echo "<input id='secretkey' name='qiniu_options[secretkey]' size='50' type='text' value='{$options['secretkey']}' />";
    echo "<div>在七牛帐号-密钥中查看</div>";
}

function qiniucloudtuchuang_imgurl_output() {
    $options = get_option('qiniu_options');
    if($options['imgurl']) { $checked = ' checked="checked" '; } else { $checked = ''; }
    echo "<input ".$checked." id='imgurl' name='qiniu_options[imgurl]' type='checkbox' />";
    echo "<div>选择后,图片链接原始地址,图片地址类似<strong>&lt;a&gt;&lt;img&gt;&lt;/a&gt;</strong><br/>不选则无链接,类似<strong>&lt;img&gt;</strong></div>";
}

//上传窗口
add_action('submitpost_box', 'qiniu_cloudtuchuang_script');
function qiniu_cloudtuchuang_script(){

    //wp_enqueue_script( 'qiniu-jquery', plugins_url('js/qiniujq.min.js', __FILE__));
    //wp_enqueue_script( 'plupload-all',plugins_url('js/plupload/js/plupload.full.min.js', __FILE__) );
	wp_enqueue_script( 'plupload-all');
    wp_enqueue_script( 'qiniu', plugins_url('js/qiniu.js', __FILE__));
    wp_enqueue_script( 'qiniu-main', plugins_url('js/main.js', __FILE__ ),array( 'jquery' ));
    wp_enqueue_script( 'qiniu-ui', plugins_url('js/ui.js', __FILE__));
}    
 
add_action('submitpost_box', 'qiniu_cloudtuchuang_post_box');
function qiniu_cloudtuchuang_post_box(){
    $options = get_option('qiniu_options');
    if($options['accesskey'] && $options['secretkey']) add_meta_box('qiniu_cloudtuchuang_div', __('七牛云图床'), 'qiniu_cloudtuchuang_post_html', 'post', 'side');
}

add_action('submitpost_box', 'qiniu_cloudtuchuang_style');
function qiniu_cloudtuchuang_style(){
	wp_enqueue_style('qiniu_cloudtuchuang_style', plugins_url('css/qiniu_cloudtuchuang.css', __FILE__));
}

function qiniu_cloudtuchuang_post_html(){
	$options = get_option('qiniu_options');
    $host = $options['host'];
    $bucket = $options['bucket'];
    $prefix = $options['prefix'];
    $accesskey = $options['accesskey'];
    $secretkey = $options['secretkey'];
    $imgurl = $options['imgurl'];
    echo "<script>";
    if (!empty($prefix)) {
        echo 'var savekey = true; var prefix = \''.$prefix.'\';';
    }else echo 'var savekey = false;';
    if (!empty($imgurl)) {
        echo 'var imgurl = true;';
    }else echo 'var imgurl = false;';
    echo 'var host =\''.  $host . '\';';
	//$nonce = wp_create_nonce('cloudtuchuang');
    //echo 'var uptokenurl=\''. plugins_url('token.php', __FILE__) . '?_ajax_nonce='. $nonce .'&secretKey='. $secretkey . '&accessKey=' . $accesskey . '&bucket=' . $bucket . '&prefix=' . $prefix .'\'</script>';
	echo 'var uptokenurl=\''. plugins_url('token.php', __FILE__) . '?secretKey='. $secretkey . '&accessKey=' . $accesskey . '&bucket=' . $bucket . '&prefix=' . $prefix .'\'</script>';
    echo '<div id="qiniu_cloudtuchuang_post"><div id="pickfiles" href="#" ><span id="spantxt">上传图片</span></div></div>';
}

add_action('media_buttons', 'qiniucloudtuchuang_add_my_media_button');
function qiniucloudtuchuang_add_my_media_button() {
    $options = get_option('qiniu_options');
    if($options['accesskey'] && $options['secretkey'])   echo '<div id="qiniu_cloudtuchuang_post_btn" style="float:left;"><a id="qiniu-insert-media-button" style="position:relative;" class="button insert-qiniuyun " title="添加图片" data-editor="content" href="javascript:;">^_^ <span id="spandesc">添加图片</span></a></div>';
}
?>