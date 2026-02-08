<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header of the agreement</title>
    <style>
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="center">Header of the agreement</h1>
<hr>
<h3 class="center">Subtitle of the agreement</h3>
<div>This is the agreement between <strong>{{ $data->client  }}</strong> and <strong>{{ $data->provider }}</strong>.
    This Agreement sets out the terms and conditions upon which <strong>the provider</strong> agrees to provide the
    services to <strong>the client</strong>.
    The Agreement constitutes the entire agreement between the parties and supersedes all prior understandings,
    agreements and representations between the parties.
    The client acknowledges that they have read and understood the Agreement, and agree to be bound by its terms and
    conditions.
</div>

<h3 class="center">Terms & Conditions</h3>
<ul>
    <li>
        <p>
            The provider will provide the services in accordance with the industry standards and with reasonable care
            and skill.
        </p>
    </li>
    <li>
        <p>
            The client agrees to provide the provider with all necessary information and materials to enable the
            provider to provide the services.
        </p>
    </li>
    <li>
        <p>
            The provider will not be liable for any loss or damage arising from the client's failure to provide
            information or materials as required above.
        </p>
    </li>
    <li>
        <p>
            The provider will not be liable for any loss or damage arising from any circumstance beyond the provider's
            reasonable control.
        </p>
    </li>
</ul>
<h3 class="center">Footer of the agreement</h3>
<footer>
    <p>Date: {{ $data->date->format('Y-m-d') }}<br>
        Signed for and on behalf of:<br>
        {{ $data->client }} (Client)<br>
        {{ $data->provider }} (Provider)
    </p>
</footer>
</body>
</html>
