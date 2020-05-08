<script>
  export let user;
</script>

<style>
  @import "/css/app.css";
</style>

<nav class="bg-blue-400 text-gray-200 w-full">
  <ul
    class="w-5/6 space-y-2 md:space-y-0 mx-auto md:h-16 flex flex-col
    md:flex-row justify-between items-center font-medium flex-wrap">
    <li class="hover:text-white hover:font-bold">
      <a href="/">Neptun 2</a>
    </li>
    <li class="hover:text-white hover:font-bold">
      <a href="/contact">Kapcsolat</a>
    </li>
    {#if !user}
      <li class="hover:text-white hover:font-bold">
        <a href="/login">Belépés</a>
      </li>
      <li class="hover:text-white hover:font-bold">
        <a href="/register">Regisztáció</a>
      </li>
    {/if}
    {#if user}
      {#if JSON.parse(user).type === 'teacher'}
        <li class="hover:text-white hover:font-bold">
          <a href="/home">Tárgyaim</a>
        </li>
        <li class="hover:text-white hover:font-bold">
          <a href="/subjects/create">Meghírdetés</a>
        </li>
      {:else}
        <li class="hover:text-white hover:font-bold">
          <a href="/home">Tárgyaim</a>
        </li>
        <li class="hover:text-white hover:font-bold">
          <a href="/enroll">Tárgy felvétele</a>
        </li>
        <li class="hover:text-white hover:font-bold">
          <a href="/todo">Feladatok listája</a>
        </li>
        <li class="hover:text-white hover:font-bold">
          <a href="/profile">
            {JSON.parse(user).lastName} {JSON.parse(user).firstName}
          </a>
        </li>
      {/if}
      <li class="hover:text-white hover:font-bold">
        <form action="/logout" method="POST">
          <button>Kilépés</button>
        </form>
      </li>
    {/if}

  </ul>
</nav>
