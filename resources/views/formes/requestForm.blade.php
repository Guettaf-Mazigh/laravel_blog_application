<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="{{asset('pages/css/validateRequest.css')}}" rel="stylesheet"/>
  <title>Validate Request</title>
</head>
<body>
  <div class="modal">
    <article class="modal-container">
      <header class="modal-container-header">
        <h1 class="modal-container-title">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
            <path fill="none" d="M0 0h24v24H0z" />
            <path fill="currentColor" d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z" />
          </svg>
          Terms and Services
        </h1>
        <form action="{{route('edit.profile')}}" method="GET">
          @csrf
          <button class="icon-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
              <path fill="none" d="M0 0h24v24H0z" />
              <path fill="currentColor" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
            </svg>
          </button>
        </form>

      </header>
      <section class="modal-container-body rtf">
        <h2>Do you want to submit a request to become an author?</h2>
        <p>This request will be processed by the platform administrator. You will receive a response in the coming days.</p>
        <h3>Criteria to follow</h3>
        <p>As an author, it is essential to maintain respectful behavior. Any threat or vulgar attack will result in the permanent suspension of your account.</p>
        <p>If you accumulate more than 5 reports, your account will be suspended for a period of 5 days.</p>
        <p>Additionally, you must follow these rules:</p>
        <ul>
            <li>Respectful behavior is mandatory at all times. Any harassment or hateful content will result in sanctions.</li>
            <li>Contributions must be relevant and meet quality standards. Inappropriate posts will be removed.</li>
            <li>Spreading false information will result in the suspension of your account.</li>
            <li>You must respect the confidentiality of personal data and not disclose sensitive information without consent.</li>
            <li>Respect copyright laws by not using protected content without permission.</li>
            <li>Administrative warnings should be taken seriously. Failing to comply with the rules may result in temporary or permanent suspension of your account.</li>
        </ul>
    </section>
    
      <footer class="modal-container-footer">
        <form action="{{route('edit.profile')}}" method="GET">
          @csrf
          <button class="button is-ghost">Decline</button>
        </form>
        <form action="{{route('validate.request')}}" method="POST">
          @csrf
          <button type="submit" class="button is-primary">Accept</button>
        </form>
        
      </footer>
    </article>
  </div>
</body>
</html>
