<section>
  <div class="container">
   <link rel="stylesheet" href="index.css" />
    <form action="https://formspree.io/f/mbjqzylv" method="POST" id="my-form">

      <div class="form-group">
        <label for="firstName"> First Name</label>
        <input type="text" id="firstName" name="firstName">
      </div>

      <div class="form-group">
        <label for="latsName">Last Name</label>
        <input type="text" id="lastName" name="lastName">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email">
      </div>

      <div class="form-group">
        <label for="feedback">Feedback</label>
        <textarea name="feedback" id="feedback" cols="30" rows="10"></textarea>
      </div>

      <button type="submit">Submit</button>
    </form>
  </div>
  <div id="status"></div>
</section>
