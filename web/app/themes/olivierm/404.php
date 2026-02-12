<?php
	get_header();
?>

<div class="cbo-page page-404">
	<section class="cbo-text">
		<div class="text-inner cbo-container container--small" style="text-align:center">
			<div class="cbo-title-1" itemprop="headline">
				<h1><?php pll_e('Erreur 404') ?></h1>
			</div>
			<div class="cbo-cms cbo-chapo" style="margin:40px auto 0">
				<p>
					<?php pll_e('La page que vous rechechez n\'existe pas.<br />Vous pouvez toujours revenir sur vos pas.') ?><br /><br />
				</p>
			</div>
			<div>
				<a href="<?php echo home_url(); ?>" class="cbo-button">
					<?php pll_e('Revenir à l\'accueil') ?>
				</a>
			</div>
		</div>
	</section>
</div>

<?php
	get_footer();
?>