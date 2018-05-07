<?php
$service_title = $post->post_title;
$active        = '';
if ($post->post_name === 'diagnostic-testing') {
    $active = 'active';
}
$listing_type = get_field('sub_services_listing_type');
$hidden_title = '';

$args     = array(
    'post_type'   => 'service',
    'post_parent' => get_the_ID(),
);
$children = get_children($args);
?>
<div class="container service-info tab-section <?php echo $active; ?>" id="<?php echo $post->post_name; ?>" >
    <h2 class="title text-center <?php echo $hidden_title; ?>">
        <?php echo $service_title; ?>
    </h2>
    <?php
    if ($children) :
        if ($listing_type == 'detailed_listing') :
            ?>
            <div class="sub-services-menu">
                <?php
                $i = 0;
                foreach ($children as $service) :
                    $i++;
                    if ($i == 1) {
                        $actve_class = 'active';
                    } else {
                        $actve_class = '';
                    }
                    ?>
                    <a href="#<?php echo $service->post_name; ?>" class="<?php echo $actve_class;?>">
                        <?php echo $service->post_name; ?>
                    </a>
                    <?php
                endforeach;
                ?>
            </div>
            <?php
        endif;
        ?>
        <div class="row sub-services-container">
            <?php
            foreach ($children as $post) :
                $icon = get_field('icon', $post->ID);
                if ($listing_type == 'detailed_listing') :
                    include locate_template('templates/post-listing/sub-services.php');
                else:
                    include locate_template('templates/post-listing/block-service.php');
                endif;
            endforeach;
            ?>
        </div>
        <?php
    endif;
    ?>
</div>
