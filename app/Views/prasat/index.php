<?=$this->extend('layout')?>
<?=$this->section('bodycontent')?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prasat</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<h2 class="section-title">Prasat</h2>
<div class="container bd-grid">
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KMD'); ?>">
      <h3 class="contact__title">Keperawatan Medikal Bedah</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KA'); ?>">
      <h3 class="contact__title">Keperawatan Anak</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KM'); ?>">
      <h3 class="contact__title">Keperawatan Maternitas</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KGD'); ?>">
      <h3 class="contact__title">Keperawatan Gawat Darurat</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KJ'); ?>">
      <h3 class="contact__title">Keperawatan Jiwa</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KG'); ?>">
      <h3 class="contact__title">Keperawatan Gerontik</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KKOM'); ?>">
      <h3 class="contact__title">Keperawatan Komunitas</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/KD'); ?>">
      <h3 class="contact__title">Keperawatan Dasar</h3>
    </a>
  </div>
  <div class="contact__box">
    <i class='fas fa-medkit contact__icon'></i>
    <a href="<?= site_url('prasat/IBD'); ?>">
      <h3 class="contact__title">Ilmu Biomedik Dasar</h3>
    </a>
  </div>
</div>
</body>
</html>


<style>
body {
  font-family: Arial, sans-serif;
}

.section-title {
  text-align: center;
  margin-bottom: 20px;
}

.container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
}

.bd-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.contact__box {
  background-color: #fff;
  border: 1px solid #ddd;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
  width: calc(33.333% - 40px); /* Responsive width with margin */
  margin: 10px; /* Margin for spacing */
}

.contact__box:hover {
  transform: translateY(-10px);
}

.contact__icon {
  font-size: 36px;
  color:  #6D93F7;
  margin-bottom: 10px;
}

.contact__title {
  font-size: 18px;
  font-weight: bold;
  color:  #6D93F7;
  margin: 10px 0;
}

.contact__box a {
  text-decoration: none;
  color: inherit;
}

@media (max-width: 768px) {
  .contact__box {
    width: calc(50% - 40px); /* Adjust width for smaller screens */
  }
}

@media (max-width: 480px) {
  .contact__box {
    width: calc(100% - 40px); /* Adjust width for mobile screens */
  }
}

</style>


      

<?=$this->endSection()?>
