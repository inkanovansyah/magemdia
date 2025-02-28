const API_URL = 'https://api.themoviedb.org/3/movie/now_playing?language=en-US&page=1';
const API_KEY = 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxNmY4YTE0OWZjZGVmMWI2ZjllNWUyZTQ2YzZlNjAxOCIsIm5iZiI6MTY2MzgxNjk3Mi41MDU5OTk4LCJzdWIiOiI2MzJiZDUwY2NmOWJhMzAwN2FhNDJiNzkiLCJzY29wZXMiOlsiYXBpX3JlYWQiXSwidmVyc2lvbiI6MX0.lhBsGj5bGQjfC3L1v7qSVEzXDNhwLvz6gNIR9d3HMLI';

fetch(API_URL, {
  method: 'GET',
  headers: {
    accept: 'application/json',
    Authorization: API_KEY
  }
})
  .then(response => response.json())
  .then(data => {
    const slider = document.getElementById('movie-slider');

    data.results.forEach(movie => {
      const movieCard = document.createElement('div');
      movieCard.className = 'rounded';
      movieCard.innerHTML = `
        <div class="rounded" style="position: relative;border-radius: 16px;overflow: hidden;>
              <figure class="mb-0">
                <img src="https://image.tmdb.org/t/p/w200${movie.poster_path}" class="card-img-top" alt="${movie.title}">
              </figure>
            <div style="left: 0;right: 0;bottom: 0;background:linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);;position: absolute;display: flex;padding: 24px 24px;flex-direction: column;">
              <h3 class="h5 font-os-bold mb-0">
                ${movie.title}
              </h3>
              <div>
                <p class="text-white fs-12" href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                  ${movie.release_date}
                </p>
              <span class="px-1 text-white fs-12">
                -
              </span>
              <span class="text-white fs-12">
                ⭐ ${movie.vote_average}/10
              </span>
            </div>
        </div>
      `;
      slider.appendChild(movieCard);
    });

    // Initialize Slick Carousel
    $('.movie-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
          }
        }
      ]
    });
  })
  .catch(error => {
    console.error('Error fetching movies:', error);
    document.getElementById('movie-slider').innerHTML = '<p>Failed to load movies.</p>';
  });