<script>
  export let task = {};
  export let teacher = false;

  function transformDate(str) {
    return new Date(str).toLocaleString();
  }

  const currentTime = new Date();

  function isTrue(bool) {
    return bool === "true";
  }
</script>

<style>
  @import "/css/app.css";
</style>

<section>
  <h1 class="text-center text-blue-500 font-bold text-4xl">{task.name}</h1>
  <div class="flex flex-col justify-center items-center space-y-4 mt-6">
    {#if isTrue(teacher)}
      <p>Leírás: {task.description}</p>
    {:else}
      <details>
        <summary>Leírás</summary>
        <p>{task.description}</p>
      </details>
    {/if}
    {#if !isTrue(teacher)}
      <p>
        Tanár: {task.subject && task.subject.creator.lastName + ' ' + task.subject.creator.firstName}
      </p>
    {/if}
    <p>Pontérték: {task.points}</p>
    <p>Kezdés: {new Date(task.from).toLocaleDateString('hu')}</p>
    <p>Határidő: {new Date(task.to).toLocaleDateString('hu')}</p>
    {#if isTrue(teacher)}
      <p>Beadott megoldások száma: {task.solutions && task.solutions.length}</p>
      <p>
        Értékelt megoldások száma: {(task.solutions || []).filter(x => !!x.rating).length}
      </p>
    {/if}
  </div>
  {#if isTrue(teacher)}
    <table class="text-left w-full border-collapse container mx-auto mt-8">
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
            Email
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Beadási idő
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Elért pontszám
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Értékelés időpontja
          </th>
          <th
            class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm
            text-grey-600 border-b border-gray-400">
            Akciók
          </th>
        </tr>
      </thead>
      <tbody>
        {#each task.solutions || [] as solution}
          <tr class="hover:bg-gray-300">
            <td class="py-4 px-6 border-b border-gray-400">
              {solution.student.lastName} {solution.student.firstName}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              {solution.student.email}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              {new Date(solution.created_at).toLocaleDateString('hu')}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              {solution.rating || '-'}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              {solution.rating_time || '-'}
            </td>
            <td class="py-4 px-6 border-b border-gray-400">
              <a href={`/solutions/${solution.id}/rate`}>
                <button
                  class="text-gray-200 font-bold py-1 px-3 rounded text-xs
                  bg-blue-400 hover:bg-blue-600">
                  {!solution.rating ? 'Értékelés' : 'Értékelés módosítása'}
                </button>
              </a>
            </td>
          </tr>
        {/each}
      </tbody>
    </table>
  {/if}
</section>
