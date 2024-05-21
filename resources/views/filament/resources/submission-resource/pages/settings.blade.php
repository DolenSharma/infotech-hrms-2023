<x-filament::page>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
<body>

    <div class="w-footer-a">
        <h4>Company Profile</h4>
        <ul class="list-unstyled">
          <li class="color-a">
            <span class="color-text-a">Phone .</span> {{ config('company.contact.phone') }}
          </li>
          <li class="color-a">
            <span class="color-text-a">Email .</span> {{ config('company.contact.email') }}
          </li>

          <li class="color-a">
              <span class="color-text-a">Country .</span> {{ config('company.address.country') }}
            </li>

            <li class="color-a">
              <span class="color-text-a">City .</span>  {{ config('company.address.city') }}
            </li>

            <li class="color-a">
              <span class="color-text-a">Street .</span>  {{ config('company.address.street') }}
            </li>
        </ul>
      </div>

     <div class="w-footer-a card-header">
        <h4>User Profile</h4>
        <ul class="list-unstyled">
          <li class="color-a">
            <span class="color-text-a">Name .</span> {{ auth()->user()->name }}
          </li>
          <li class="color-a">
            <span class="color-text-a">Email .</span> {{ auth()->user()->email }}
          </li>

          <li class="color-a">
              <span class="color-text-a">UID .</span> {{ auth()->user()->id }}
            </li>
        </ul>
      </div>
</body>
</html>
</x-filament::page>
