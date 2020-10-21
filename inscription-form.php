<?php global $inscription_form; ?>


<form id="inscription_form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data">


    <div class="row">
        <div class="col-sm-4">
            <label>
                <input type="radio" name="title" id="title" value="Monsieur">
                <strong>Monsieur</strong>
            </label>

            <label>
                <input type="radio" name="title" id="title" value="Madame">
                <strong>Madame</strong>
            </label>

        </div>
        <div class="col-sm-4">
            <input type="text" required id="input_first_name" name="first_name" placeholder="<?php _e('Prénom', 'webfactor'); ?>" />
        </div>
        <div class="col-sm-4">
            <input type="text" required id="input_last_name" name="last_name" placeholder="<?php _e('Nom', 'webfactor'); ?>" />
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <input type="text" required id="input_email" name="email" placeholder="<?php _e('Email', 'webfactor'); ?>" />
        </div>
        <div class="col-sm-4">
            <input type="text" id="input_telephone" name="telephone" placeholder="<?php _e('Téléphone', 'webfactor'); ?>">
        </div>
        <div class="col-sm-4">
        </div>
    </div>


    <?php if ($inscription_form == 'complex') : ?>


        <div class="row">


            <div class="col-sm-8 col-sm-push-4">


                <?php $pricing = get_field_object('pricing'); ?>
                <div id="choices_rows">
                    <?php $i = 1;
                    while (have_rows('pricing')) : the_row(); ?>
                        <div class="row">
                            <?php $item =  get_sub_field('item'); ?>

                            <div class="col-sm-6" style="text-align:right">
                                <label for="choice_<?php echo $i; ?>"><?php echo  $item; ?></label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" placeholder="0" name="choice_<?php echo $i; ?>" step="1" min="1" id="choice_<?php echo $i; ?>" />
                                <input type="hidden" placeholder="0" name="choice_<?php echo $i; ?>_name" value="<?php echo $item; ?>">

                            </div>
                        </div>
                    <?php $i++;
                    endwhile; ?>
                </div>


            </div>

        </div>

    <?php endif;  # if complex form 
    ?>

    <div class="row">
        <div class="col-sm-8">

            <?php if (isset($_GET['success'])) : ?>
                <p class="alert_message alert_success">Votre inscription a bien été enregistrée</p>
            <?php endif; ?>
            <?php if (isset($_GET['problem'])) : ?>
                <p class="alert_message alert_error">Erreur</p>
            <?php endif; ?>


        </div>
        <div class="col-sm-4">

            <input type="hidden" name="action" value="inscription_form">
            <input type="hidden" name="event_id" value="<?php echo get_the_ID(); ?>">
            <input type="hidden" name="event_title" value="<?php echo get_the_title(); ?>">
            <div id="inscription_submit_button_outer">
                <input id="inscription_submit_button" type="submit" value="<?php _e('Inscrivez-vous', 'webfactor'); ?>">
            </div>

        </div>
    </div>



</form>