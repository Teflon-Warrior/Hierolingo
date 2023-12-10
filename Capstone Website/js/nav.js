function openNav() {
    document.querySelector('#mySidenav').style.width = "250px"; 
    document.querySelector('.all-over-bkg').classList.add('is-visible');
  }
  
  function closeNav() {
    document.querySelector('#mySidenav').style.width = "0"; 
    document.querySelector('.all-over-bkg').classList.remove('is-visible');
  }
  
  document.querySelector('.openbtn').addEventListener('click', openNav);
  document.querySelector('.closebtn').addEventListener('click', closeNav);

  /* Javascript for side menu is from Project 5 Starter from Web Design I360 */