<?php
	/*
	Template Name: Search
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	$results = new WP_Query($query_string . "&posts_per_page=-1");
?>

	<main class="main template-search" id="content" role="main">
		<div class="search" data-search>
			<h1 class="search__title">Search <?php bloginfo("sitename"); ?></h1>
			<?php
				get_search_form(true); 
			?>
			<div class="search-results search__results" data-search-results>
				<?php
					if($results->have_posts()):
				?>
					<?php 
						if(!empty(get_search_query())):
					?>
						<ol class="search-results__list">
							<?php 
								while($results->have_posts()): 
									$results->the_post(); 
									get_template_part('partials/search/results-list');
								endwhile;
							?>
						</ol>
					<?php
						else:
					?>
						<!--<div class="search-results__message search-results__message--no-results">
							<div class="content">
								<p></p>
							</div>
						</div>-->
					<?php
						endif; 
					?>
				<?php
					else:
				?>
					<div class="search-results__message search-results__message--empty">
						<h2>We found nothing :(</h2>
						<div class="content">
							<p>Try searching for something else. You might have more luck this time!</p>
						</div>
					</div>
				<?php
					endif; 
				?>
			</div>
		</div>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>