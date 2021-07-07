<div class="relative rounded-lg border border-gray-300 bg-white px-4 py-5 shadow-sm space-x-3">
  <div class="flex items-center">  
    <div class="flex-shrink-0">
          <div class="h-10 w-10 rounded-full bg-green-500 text-white flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
            </svg>
          </div>
    </div>
    <div class="flex-1 min-w-0 ml-5">
          <p class="text-sm font-medium text-gray-900">
            <strong>{{ $gift->name }}</strong><br/>
            <small class="text-gray-500">Offered by {{ $company->name }}</small>
          </p>
    </div>
  </div>

  @if($hasCouponCode)
    <div class="mx-6 my-4 border-t border-gray-light mt-5 pt-5 flex justify-between items-center">
      <div>
        <small class="text-gray-500">Your coupon code is</small><br/>
        <strong>{{ $scan->coupon_code }}</strong>
      </div>
      <div class="mt-2 pr-2">
        <a class="h-8 px-4 pt-1 m-2 block bg-blue-500 rounded w-full text-sm text-white focus:shadow-outline hover:bg-indigo-800" href="mailto:{{ $scan->code->company->email }}?subject=snapwin.it%20%7C%20Win%20claiming&body=Bonjour%2CMon%20code%20de%20victoire%20est%20{{ $scan->coupon_code }}Cordialement%2C ">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
          </svg> Claim now
        </a>
        <button id="test-{{ $scan->id }}" class="h-8 px-4 m-2 block w-full bg-blue-500 rounded text-sm text-white focus:shadow-outline hover:bg-indigo-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
          </svg>
          Save
        </button>
      </div>
    </div>
  @endif
</div>

<script type="text/javascript">

elem = document.getElementById("test-{{ $scan->id }}");
console.log(elem);

elem.addEventListener('click', event => {
  if (navigator.share) {
    navigator.share({
      title: 'My snapwin coupon code',
      text: 'My snapwin coupon code for the {{ $gift->name }} is {{ $scan->coupon_code }}'
    }).then(() => {
      console.log('Thanks for sharing!');
    })
    .catch(console.error);
  } else {
    console.log("nop");
  }
});
</script>