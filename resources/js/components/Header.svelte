<script>
  export let user;
</script>

<style>
  @import "css/app.css";
</style>

<nav class="bg-blue-400 text-gray-200">
  <ul class="w-5/6 mx-auto h-16 flex justify-between items-center font-medium">
    <li class="hover:text-white hover:font-bold">
      <a href="/">Neptun 2</a>
    </li>
    <li class="hover:text-white hover:font-bold">
      <a href="/contact">Kapcsolat</a>
    </li>
    {#if !user}
      <li class="hover:text-white hover:font-bold">
        <a href="/login">Login</a>
      </li>
      <li class="hover:text-white hover:font-bold">
        <a href="/register">Register</a>
      </li>
    {/if}
    {#if user}
      <li class="hover:text-white hover:font-bold">
        <form action="/logout" method="POST">
          <button>Kilépés</button>
        </form>
      </li>
    {/if}

  </ul>
</nav>
