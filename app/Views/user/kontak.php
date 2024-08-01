<?=$this->extend('user/template/index')?>
<?=$this->section('page-content')?>

<!--===== CONTACT ME =====-->
<section class="contact section bd-container" id="contact">
  <div class="contact__container bd-grid">
    <div class="contact__content bd-grid">
      <div class="contact__box">
        <i class="bx bx-home contact__icon"></i>
        <h3 class="contact__title">Alamat</h3>
        <span class="contact__description">Jl. R. Syamsudin, S.H. No. 50, Cikole, Kota Sukabumi</span>
      </div>

      <div class="contact__box">
        <i class="bx bx-phone contact__icon"></i>
        <h3 class="contact__title">Nomor Telphone</h3>
        <span class="contact__description">999-888-777</span>
      </div>

      <div class="contact__box">
        <i class="bx bx-envelope contact__icon"></i>
        <h3 class="contact__title">Gmail</h3>
        <span class="contact__description">clayuser@email.com</span>
      </div>

      <div class="contact__box">
        <i class="bx bx-chat contact__icon"></i>
        <h3 class="contact__title">Website</h3>
        <div>
          <a target="_blank" rel="contact__social" href="https://www.facebook.com/fauzanmakarim.rambe"><i class="bx bxl-whatsapp"></i></a>
        </div>
      </div>
    </div>

    <form action="" class="contact__form">
      <div class="contact__inputs">
        <input type="text" placeholder="Name" class="contact__input">
        <input type="int" placeholder="NIM" class="contact__input">
      </div>

      <div class="contact__inputs">
        <input type="text" placeholder="Project" class="contact__input">
        <input type="number" placeholder="Number" class="contact__input">
      </div>

      <textarea name="" id="" cols="0" rows="7" placeholder="Message" class="contact__input"></textarea>

      <input type="submit" value="Send Message" class="button contact__button">
    </form>
  </div>
</section>

<style>
    /*===== GOOGLE FONTS =====*/
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

/*===== VARIABLES CSS =====*/
:root{
  --header-height: 3rem;

  /*===== Colors =====*/
  --first-color: #6D93F7;
  --first-color-dark: #6D93F7;
  --text-color:#FBF9F9;
  --first-color-light: #fff;
  --first-color-lighten: #FBF9F9;

  /*===== Font and typography =====*/
  --body-font: 'Poppins', sans-serif;
  --biggest-font-size: 2.5rem;
  --h1-font-size: 1.5rem;
  --h2-font-size: 1.25rem;
  --h3-font-size: 1.125rem;
  --normal-font-size: .938rem;
  --small-font-size: .813rem;
  --smaller-font-size: .75rem;

  /*===== Font weight =====*/
  --font-medium: 500;
  --font-semi-bold: 600;
  --font-bold: 700;

  /*===== Margins =====*/
  --mb-1: .5rem;
  --mb-2: 1rem;
  --mb-3: 1.5rem;
  --mb-4: 2rem;
  --mb-5: 2.5rem;
  --mb-6: 3rem;

  /*===== z index =====*/
  --z-normal: 1;
  --z-tooltip: 10;
  --z-fixed: 100;
}
  
@media screen and (min-width: 768px){
  :root{
    --biggest-font-size: 4.5rem;
    --h1-font-size: 2.25rem;
    --h2-font-size: 1.5rem;
    --h3-font-size: 1.25rem;
    --normal-font-size: 1rem;
    --small-font-size: .875rem;
    --smaller-font-size: .813rem;
  }
}

/*===== BASE =====*/
*,::before,::after{
  box-sizing: border-box;
}

html{
  scroll-behavior: smooth;
}

body{
  margin: var(--header-height) 0 0 0;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
  font-weight: var(--font-medium);
  background-color: var(--first-color);
  color: var(--text-color);
  line-height: 1.6;
}

h1,h2,h3,ul,p{
  margin: 0;
}

h2,h3{
  font-weight: var(--font-semi-bold);
}

ul{
  padding: 0;
  list-style: none;
}

a{
  text-decoration: none;
}

/*===== CLASS CSS =====*/
.section {
  padding: 4rem 0 2rem;
}

.section-title, .section-subtitle {
  text-align: center;
}

.section-title {
  font-size: var(--h1-font-size);
  color: var(--first-color);
  margin-bottom: var(--mb-3);
}

.section-subtitle {
  display: block;
  font-size: var(--smaller-font-size);
  font-weight: var(--font-semi-bold);
}

/*===== LAYOUT =====*/
.bd-container {
  max-width: 1024px;
  width: calc(100% - 2rem);
  margin-left: var(--mb-2);
  margin-right: var(--mb-2);
}

.bd-grid {
  display: grid;
  gap: 1.5rem;
}

/*===== BUTTON =====*/
.button {
  display: inline-block;
  background-color: #4173F2;
  color: var(--first-color-light);
  padding: .75rem 1rem;
  border-radius: .25rem;
  transition: .3s;
}

.button:hover {
  background-color: var(--first-color);
}

/*===== CONTACT ME =====*/
.contact__container {
  row-gap: 2.5rem;
}

.contact__content {
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
}

.contact__box {
  background-color: #fff;
  border-radius: .5rem;
  padding: 1.5rem;
  text-align: center;
  box-shadow: 0 4px 6px rgba(174, 190, 205, .3);
}

.contact__box{
    color: var(--first-color); /* Change the color to white */
}

.contact__icon {
  color: var(--first-color);
}

.contact__icon {
  font-size: 2rem;
}

.contact__title {
  color: var(--first-color); 
  font-size: var(--h3-font-size);
  margin: var(--mb-1) 0;
}

.contact__social {
  color: var(--first-color);
  font-size: 1.25rem;
  margin:  var(--mb-1);
}

.contact__box:hover {
  box-shadow: 0 6px 8px rgba(174, 190, 205, .4);
}

.contact__inputs {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  column-gap: 1rem;
}

.contact__input, .contact__button {
  outline: none;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
}

.contact__input {
  width: 100%;
  padding: 1rem;
  border: 2px solid var(--first-color);
  color: var(--first-color);
  border-radius: .5rem;
  margin-bottom: var(--mb-1);
}

.contact::placeholder {
  color: var(--first-color);
  font-family: var(--body-font);
  font-weight: var(--font-semi-bold);
}

.contact__button {
  cursor: pointer;
  border: none;
}


/*===== MEDIA QUERIES =====*/
@media screen and (min-width: 576px) {
  .contact__form {
    width: 450px;
    justify-self: center;
  }
}

@media screen and (min-width: 1024px) {
  .bd-container {
    margin-left: auto;
    margin-right: auto;
  }
}
</style>

<?=$this->endSection()?>