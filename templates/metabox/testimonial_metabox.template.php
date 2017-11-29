<?php
/**
 * Template for Testimonials CPT Metabox
 * @var string $__testimonial_company_name
 * @var string $__testimonial_person_name
 *
 */
?>
<div class="metabox">
    <label for="_testimonial_person_name">Person Name</label>
    <div class="subtitle_italic">i.e., Zach Smith, etc</div>
    <input type="text" name="_testimonial_person_name" value="<?=$_testimonial_person_name[0]?>" class="widefat" />

    <label for="_testimonial_company_name">Company Name</label>
    <div class="subtitle_italic">i.e., EFS Networks, Craft & Clover, etc</div>
    <input type="text" name="_testimonial_company_name" value="<?=$_testimonial_company_name[0]?>" class="widefat" />
</div>