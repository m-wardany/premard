<div class="our-Clients">
    <div class="container">
        <div class="our-Clients-title">Our Clients</div>
        <div id="our-Clients-slider">
            <div class="our-Clients-slider">
                <?php foreach ($model as $client) : ?>
                    <div>
                       <img src="<?= $client->getUploadUrl('logo') ?>" class="img-responsive">
                    </div>  
                <?php endforeach; ?>
            </div>
        </div><!--our-Clients-slider-->
    </div><!--container-->
</div><!--our-Clients-->