get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Oups ! La page que vous cherchez n'existe pas ...</h1>
				</header>

				<div class="page-content">
                    <p>Nous sommes désolés mais la page que vous cherchez n'est pas ou plus disponible. Nous vous suggérons de vous rendre sur <a href="<?php get_site_url() ?>">la page d'accueil</a> du site ou d'effectuer une nouvelle recherche</p>
				</div>
			</div>

		</main>
	</div>

<?php
get_footer();