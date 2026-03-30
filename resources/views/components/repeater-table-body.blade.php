<table class="text-xs border-collapse" style="min-width: max-content; width: 100%; table-layout: fixed;">
    <thead>
        <tr class="bg-gray-50">
            <th
                class="sticky left-0 top-0 z-20 bg-gray-50 border border-gray-200 px-2 py-1.5 text-gray-500 font-semibold text-center w-8">
                #</th>
            <template x-for="(col, ci) in columns" :key="ci">
                <th class="sticky top-0 z-10 bg-gray-50 border border-gray-200 px-2 py-1.5 text-gray-600 font-semibold whitespace-nowrap text-left"
                    :style="`min-width: ${col.width || '120px'}`" x-text="col.label">
                </th>
            </template>
            <th
                class="sticky top-0 right-0 z-20 bg-gray-50 border border-gray-200 px-2 py-1.5 text-gray-500 font-semibold text-center w-16">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        {{-- Spacer top --}}
        <tr x-show="scrollTop > 0">
            <td :colspan="columns.length + 2" :style="`height: ${scrollTop}px; padding:0; border:none;`"></td>
        </tr>

        <template x-for="(row, ri) in visibleRows()" :key="ri + startIndex">
            <tr :class="selectedRows.has(ri + startIndex) ? 'bg-blue-100' : 'hover:bg-gray-50'"
                class="transition-colors" @mousedown="startDragSelect(ri + startIndex, $event)"
                @mousemove="dragSelect(ri + startIndex, $event)">
                <td class="sticky left-0 border border-gray-200 px-2 py-0.5 text-gray-400 text-center text-xs w-8 select-none"
                    :class="selectedRows.has(ri + startIndex) ? 'bg-blue-100' : 'bg-white'"
                    x-text="ri + startIndex + 1">
                </td>

                <template x-for="(col, ci) in columns" :key="ci">
                    <td class="border border-gray-200 p-0" :style="`min-width: ${col.width || '120px'}`">
                        <template x-if="col.type === 'textarea'">
                            <textarea x-model="rows[ri + startIndex][col.key]" rows="1"
                                class="w-full px-1.5 py-1 text-xs border-0 focus:ring-1 focus:ring-inset focus:ring-blue-400 focus:outline-none bg-transparent resize-none"></textarea>
                        </template>
                        <template x-if="col.type === 'select'">
                            <select x-model="rows[ri + startIndex][col.key]"
                                class="w-full h-7 px-1 text-xs border-0 focus:ring-1 focus:ring-inset focus:ring-blue-400 focus:outline-none bg-transparent">
                                <option value="" x-text="col.placeholder || 'Select...'"></option>
                                <template x-for="opt in (col.options || [])" :key="opt.value">
                                    <option :value="opt.value" x-text="opt.label"></option>
                                </template>
                            </select>
                        </template>
                        <template x-if="col.type === 'date'">
                            <input type="date" x-model="rows[ri + startIndex][col.key]"
                                class="w-full h-7 px-1.5 text-xs border-0 focus:ring-1 focus:ring-inset focus:ring-blue-400 focus:outline-none bg-transparent" />
                        </template>
                        <template x-if="col.type === 'number'">
                            <input type="number" x-model="rows[ri + startIndex][col.key]"
                                class="w-full h-7 px-1.5 text-xs border-0 focus:ring-1 focus:ring-inset focus:ring-blue-400 focus:outline-none bg-transparent" />
                        </template>
                        <template x-if="col.type === 'checkbox'">
                            <div class="flex justify-center items-center h-7">
                                <input type="checkbox" x-model="rows[ri + startIndex][col.key]"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-400 cursor-pointer" />
                            </div>
                        </template>
                        <template x-if="!col.type || col.type === 'text'">
                            <input type="text" x-model="rows[ri + startIndex][col.key]"
                                class="w-full h-7 px-1.5 text-xs border-0 focus:ring-1 focus:ring-inset focus:ring-blue-400 focus:outline-none bg-transparent" />
                        </template>
                    </td>
                </template>

                <td class="sticky right-0 border border-gray-200 px-1 py-0.5 text-center w-16 shadow-[-2px_0_4px_rgba(0,0,0,0.06)]"
                    :class="selectedRows.has(ri + startIndex) ? 'bg-blue-100' : 'bg-white'">
                    <div class="flex items-center justify-center gap-1">
                        <button type="button" @click="cloneRow(ri + startIndex)" title="Clone"
                            class="text-gray-400 hover:text-blue-500 p-0.5 rounded cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                        <button type="button" @click="deleteRow(ri + startIndex)" title="Delete"
                            class="text-gray-400 hover:text-red-500 p-0.5 rounded cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        </template>

        {{-- Spacer bottom --}}
        <tr x-show="scrollBottom > 0">
            <td :colspan="columns.length + 2" :style="`height: ${scrollBottom}px; padding:0; border:none;`"></td>
        </tr>
    </tbody>
</table>
