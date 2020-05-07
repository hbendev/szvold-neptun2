<script>
  import App from "./../../../vendor/wewowweb/laravel-svelte-preset/src/stubs/App.svelte";
  import { onMount } from "svelte";
</script>

<style>
  @import "css/app.css";
</style>

<section class="container mx-auto overflow-x-scroll">
  <button
    class="font-bold py-2 px-4 rounded text-lg bg-green-400 hover:bg-green-600
    text-white ">
    Új tárgy +
  </button>
  <div class="bg-white shadow-md rounded my-6">
    <table class="text-left w-full border-collapse">
      <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
      <thead>
        <tr>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Név
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Leírás
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Kód
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Kredit
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Funkciók
          </th>
        </tr>
      </thead>
      <tbody>
        {#await fetch('/subjectsCreatedBy').then(data => data.json())}
          <!-- promise is pending -->
        {:then subjects}
          {#each subjects as subject}
            <tr class="hover:bg-gray-300">
              <td class="py-4 px-6 border-b border-gray-400">{subject.name}</td>
              <td class="py-4 px-6 border-b border-gray-400">
                {subject.description}
              </td>
              <td class="py-4 px-6 border-b border-gray-400">
                {subject.identifier}
              </td>
              <td class="py-4 px-6 border-b border-gray-400">
                {subject.credit}
              </td>
              <td class="py-4 px-6 border-b border-gray-400">
                {#if !subject.isPublished}
                  <button
                    class="text-gray-300 font-bold py-1 px-3 rounded text-xs
                    bg-green-400 hover:bg-green-600">
                    Publikálás
                  </button>
                {:else}
                  <button
                    class="text-gray-300 font-bold py-1 px-3 rounded text-xs
                    bg-blue-400 hover:bg-blue-600">
                    Publikálás visszavonása
                  </button>
                {/if}
                <button
                  class="text-gray-300 font-bold py-1 px-3 rounded text-xs
                  bg-yellow-400 hover:bg-yellow-600">
                  Szerkesztés
                </button>
              </td>
            </tr>
          {/each}
        {/await}
      </tbody>
    </table>
  </div>
</section>
