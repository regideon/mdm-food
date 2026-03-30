@props([
    'columns' => [],
    'defaultItems' => 1,
])

<div x-data="repeaterTable({{ json_encode($columns) }}, {{ $defaultItems }})" x-init="init()" class="w-full" @mouseup.window="endDragSelect()">
    {{-- Toolbar --}}
    <div class="flex items-center gap-2 mb-1 flex-wrap">

        <button type="button" @click="toggleFullscreen()"
            class="flex items-center gap-1 text-xs px-2 h-6 border border-gray-300 rounded hover:bg-gray-50 text-gray-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 8V5a1 1 0 011-1h3M4 16v3a1 1 0 001 1h3m10-14h-3a1 1 0 00-1 1v3m4 10h-3a1 1 0 01-1-1v-3" />
            </svg>
            <span x-text="isFullscreen ? 'Exit Fullscreen' : 'Fullscreen'"></span>
        </button>

        <button type="button" @click="copySelected()" x-show="selectedRows.size > 0"
            class="flex items-center gap-1 text-xs px-2 h-6 border border-blue-300 rounded hover:bg-blue-50 text-blue-600 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            Copy (<span x-text="selectedRows.size"></span>)
        </button>

        <button type="button" @click="pasteRows()" x-show="copiedRows.length > 0"
            class="flex items-center gap-1 text-xs px-2 h-6 border border-green-300 rounded hover:bg-green-50 text-green-600 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Paste (<span x-text="copiedRows.length"></span> rows)
        </button>

        <span x-show="selectedRows.size > 0" class="text-xs text-gray-400">
            <span x-text="selectedRows.size"></span> row(s) selected
            <button type="button" @click="selectedRows = new Set(); selectedRows = selectedRows"
                class="ml-1 text-gray-400 hover:text-gray-600">✕</button>
        </span>

        <div class="flex items-center gap-1 ml-auto">
            <input x-model="bulkCount" type="number" min="1" max="50"
                class="w-12 h-6 text-xs text-center border border-gray-300 rounded px-1 focus:outline-none focus:ring-1 focus:ring-blue-400" />
            <button type="button" @click="bulkAdd()"
                class="text-xs px-2.5 h-6 border border-gray-300 rounded hover:bg-gray-50 text-gray-600 whitespace-nowrap cursor-pointer">
                + Bulk Add
            </button>
        </div>
    </div>

    {{-- Normal Table --}}
    <div x-show="!isFullscreen" class="overflow-auto border border-gray-200 rounded-lg" style="max-height: 60vh;">
        @include('components.repeater-table-body')
    </div>

    {{-- Normal Footer --}}
    <div x-show="!isFullscreen" class="flex items-center gap-2 mt-1.5">
        <button type="button" @click="addRow()"
            class="flex items-center gap-1 text-xs text-blue-600 hover:text-blue-800 font-medium cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Row
        </button>
        <span class="text-xs text-gray-400" x-text="`${rows.length} row(s)`"></span>
    </div>

    {{-- Fullscreen overlay --}}
    <div x-show="isFullscreen" x-cloak class="fixed inset-0 z-[99999] bg-white p-3 flex flex-col">

        {{-- Fullscreen Toolbar --}}
        <div class="flex items-center gap-2 mb-2 flex-wrap">
            <button type="button" @click="toggleFullscreen()"
                class="flex items-center gap-1 text-xs px-2 h-6 border border-gray-300 rounded hover:bg-gray-50 text-gray-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 9V6a1 1 0 00-1-1H5M9 15v3a1 1 0 01-1 1H5m14-10h-3a1 1 0 01-1-1V5m4 10h-3a1 1 0 00-1 1v3" />
                </svg>
                Exit Fullscreen
            </button>

            <button type="button" @click="copySelected()" x-show="selectedRows.size > 0"
                class="flex items-center gap-1 text-xs px-2 h-6 border border-blue-300 rounded hover:bg-blue-50 text-blue-600 cursor-pointer">
                Copy (<span x-text="selectedRows.size"></span>)
            </button>

            <button type="button" @click="pasteRows()" x-show="copiedRows.length > 0"
                class="flex items-center gap-1 text-xs px-2 h-6 border border-green-300 rounded hover:bg-green-50 text-green-600 cursor-pointer">
                Paste (<span x-text="copiedRows.length"></span> rows)
            </button>

            <span x-show="selectedRows.size > 0" class="text-xs text-gray-400">
                <span x-text="selectedRows.size"></span> selectedw
            </span>

            <div class="flex items-center gap-1 ml-auto">
                <input x-model="bulkCount" type="number" min="1" max="50"
                    class="w-12 h-6 text-xs text-center border border-gray-300 rounded px-1" />
                <button type="button" @click="bulkAdd()"
                    class="text-xs px-2.5 h-6 border border-gray-300 rounded hover:bg-gray-50 text-gray-600 whitespace-nowrap cursor-pointer">
                    + Bulk Add
                </button>
            </div>
        </div>

        {{-- Fullscreen Table --}}
        <div class="overflow-auto flex-1 border border-gray-200 rounded-lg">
            @include('components.repeater-table-body')
        </div>

        {{-- Fullscreen Footer --}}
        <div class="flex items-center gap-2 mt-1.5">
            <button type="button" @click="addRow()"
                class="flex items-center gap-1 text-xs text-blue-600 hover:text-blue-800 font-medium cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add Row
            </button>
            <span class="text-xs text-gray-400" x-text="`${rows.length} row(s)`"></span>
        </div>
    </div>
</div>

<script>
    function repeaterTable(columns, defaultItems) {
        return {
            columns,
            rows: [],
            selectedRows: new Set(),
            copiedRows: [],
            bulkCount: 10,
            isDragging: false,
            dragStartIndex: null,
            isFullscreen: false,

            // Virtual scroll
            rowHeight: 29,
            visibleCount: 20,
            startIndex: 0,
            scrollTop: 0,
            scrollBottom: 0,

            init() {
                if (this.rows.length > 0) return;
                for (let i = 0; i < defaultItems; i++) this.rows.push(this.emptyRow());
                this.$nextTick(() => {
                    this.initResize();
                    this.initScroll();
                });
            },

            emptyRow() {
                const row = {};
                this.columns.forEach(col => row[col.key] = '');
                return row;
            },

            visibleRows() {
                return this.rows.slice(this.startIndex, this.startIndex + this.visibleCount);
            },

            initScroll() {
                this.$el.querySelectorAll('.overflow-auto').forEach(container => {
                    if (container._scrollInit) return;
                    container._scrollInit = true;

                    const update = () => {
                        const scrolled = container.scrollTop;
                        const newStart = Math.max(0, Math.floor(scrolled / this.rowHeight) - 5);
                        this.startIndex = newStart;
                        this.scrollTop = newStart * this.rowHeight;
                        this.scrollBottom = Math.max(0, (this.rows.length - newStart - this.visibleCount) *
                            this.rowHeight);
                    };

                    container.addEventListener('scroll', update);
                    update();
                });
            },

            addRow() {
                this.rows.push(this.emptyRow());
            },

            bulkAdd() {
                const count = Math.min(200, Math.max(1, parseInt(this.bulkCount) || 10));
                for (let i = 0; i < count; i++) this.rows.push(this.emptyRow());
                this.$nextTick(() => this.initScroll());
            },

            deleteRow(index) {
                this.rows.splice(index, 1);
                this.selectedRows.delete(index);
                this.selectedRows = new Set(this.selectedRows);
                if (this.rows.length === 0) this.rows.push(this.emptyRow());
            },

            cloneRow(index) {
                const clone = JSON.parse(JSON.stringify(this.rows[index]));
                this.rows.splice(index + 1, 0, clone);
            },

            startDragSelect(index, event) {
                if (event.target.closest('input, select, textarea, button')) return;
                this.isDragging = true;
                this.dragStartIndex = index;
                if (!event.shiftKey && !event.ctrlKey && !event.metaKey) {
                    this.selectedRows = new Set();
                }
                this.selectedRows.add(index);
                this.selectedRows = new Set(this.selectedRows);
                event.preventDefault();
            },

            dragSelect(index, event) {
                if (!this.isDragging || this.dragStartIndex === null) return;
                const from = Math.min(this.dragStartIndex, index);
                const to = Math.max(this.dragStartIndex, index);
                const newSet = new Set();
                for (let i = from; i <= to; i++) newSet.add(i);
                this.selectedRows = newSet;
            },

            endDragSelect() {
                this.isDragging = false;
            },

            copySelected() {
                const sorted = [...this.selectedRows].sort((a, b) => a - b);
                this.copiedRows = sorted.map(i => JSON.parse(JSON.stringify(this.rows[i])));
            },

            pasteRows() {
                if (this.copiedRows.length === 0) return;
                const sorted = [...this.selectedRows].sort((a, b) => a - b);
                const startIndex = sorted.length > 0 ? sorted[0] : this.rows.length;
                this.copiedRows.forEach((rowData, offset) => {
                    const targetIndex = startIndex + offset;
                    if (targetIndex < this.rows.length) {
                        this.rows[targetIndex] = JSON.parse(JSON.stringify(rowData));
                    } else {
                        this.rows.push(JSON.parse(JSON.stringify(rowData)));
                    }
                });
                this.rows = [...this.rows];
            },

            toggleFullscreen() {
                this.isFullscreen = !this.isFullscreen;
                this.$nextTick(() => {
                    this.initResize();
                    this.initScroll();
                });
            },

            initResize() {
                this.$el.querySelectorAll('table').forEach(table => {
                    if (table._resizeInit) return;
                    table._resizeInit = true;

                    const ths = table.querySelectorAll('thead th');
                    ths.forEach((th, index) => {
                        if (index === 0 || index === ths.length - 1) return;

                        const handle = document.createElement('div');
                        handle.style.cssText = `
                        position: absolute;
                        top: 0;
                        right: 0;
                        width: 5px;
                        height: 100%;
                        cursor: col-resize;
                        z-index: 30;
                        background: transparent;
                        transition: background 0.15s;
                    `;

                        handle.addEventListener('mouseenter', () => {
                            if (!handle._resizing) handle.style.background = '#3b82f6';
                        });
                        handle.addEventListener('mouseleave', () => {
                            if (!handle._resizing) handle.style.background = 'transparent';
                        });

                        th.style.position = 'relative';
                        th.style.userSelect = 'none';
                        th.appendChild(handle);

                        let startX, startWidth;

                        handle.addEventListener('mousedown', (e) => {
                            e.preventDefault();
                            e.stopPropagation();
                            startX = e.pageX;
                            startWidth = th.offsetWidth;
                            handle._resizing = true;
                            handle.style.background = '#3b82f6';
                            table.style.cursor = 'col-resize';
                            table.style.userSelect = 'none';

                            const onMouseMove = (e) => {
                                const newWidth = Math.max(60, startWidth + (e.pageX -
                                    startX));
                                th.style.minWidth = newWidth + 'px';
                                th.style.width = newWidth + 'px';
                            };

                            const onMouseUp = () => {
                                handle._resizing = false;
                                handle.style.background = 'transparent';
                                table.style.cursor = '';
                                table.style.userSelect = '';
                                document.removeEventListener('mousemove', onMouseMove);
                                document.removeEventListener('mouseup', onMouseUp);
                            };

                            document.addEventListener('mousemove', onMouseMove);
                            document.addEventListener('mouseup', onMouseUp);
                        });
                    });
                });
            },
        }
    }
</script>
