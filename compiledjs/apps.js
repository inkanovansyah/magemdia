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
      movieCard.className = 'movie-card';
      movieCard.innerHTML = `
        <div class="card bg-dark rounded">
           <img src="https://image.tmdb.org/t/p/w200${movie.poster_path}" 
               class="card-img-top" 
                    alt="${movie.title}">
           <div class="text-start card-body">
               <h5 class="card-title">${movie.title}</h5>
               <p class="card-text">${movie.release_date}</p>
               <p class="card-text">Rating: ${movie.vote_average}/10</p>
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
      dots: false,
      arrows: true,
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