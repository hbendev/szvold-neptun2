<script>
  import { onMount } from "svelte";
  async function changePublish(id) {
    // we need the token, and other things to work with laravel
    let token = document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");
    try {
      const result = await fetch(`/abandonSubject/${id}`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json, text-plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token
        },
        credentials: "same-origin"
      }).then(data => data.json());

      // TODO: This has to redirect according to the task
      subjects = subjects.filter(subject => subject.id !== id);
    } catch (err) {
      console.error(err);
    }
  }

  let subjects = [];

  export let userid;

  onMount(() => {
    setTimeout(async () => {
      subjects = await fetch(`/studentSubjects/${userid}`).then(data =>
        data.json()
      );
    }, 0);
  });
</script>

<style>
  @import "css/app.css";
</style>

<section class="container mx-auto overflow-x-visible">
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
            Tanár
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Funkciók
          </th>
        </tr>
      </thead>
      <tbody>
        {#each subjects as subject}
          <tr class="hover:bg-gray-300">
            <td class="py-4 px-6 border-b border-gray-400">{subject.name}</td>
            <td class="py-4 px-6 border-b border-gray-400">
              {subject.description}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              {subject.identifier}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">{subject.credit}</td>
            <td class="py-4 px-6 border-b border-gray-400">
              {subject.creator.lastName} {subject.creator.firstName}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              <button
                on:click={() => changePublish(subject.id)}
                class="text-gray-200 font-bold py-1 px-3 rounded text-xs
                bg-red-400 hover:bg-red-600">
                Lead
              </button>
            </td>
          </tr>
        {/each}
      </tbody>
    </table>
  </div>
</section>
