document.addEventListener("DOMContentLoaded", () => {
    initColumnResize();
    initFullscreen();
    initCopyPaste();
});
document.addEventListener("livewire:navigated", () => {
    initColumnResize();
    initFullscreen();
    initCopyPaste();
});
document.addEventListener("livewire:update", () => {
    setTimeout(() => {
        initColumnResize();
        initFullscreen();
        initCopyPaste();
    }, 150);
});

/* ── Column Resize ─────────────────────────────────── */
function getTableKey(table) {
    const headers = [...table.querySelectorAll("thead th")]
        .map((th) => th.textContent.trim())
        .join("|");
    return (
        "col-widths:" +
        location.pathname +
        ":" +
        btoa(unescape(encodeURIComponent(headers))).slice(0, 32)
    );
}

function saveWidths(table) {
    const headers = table.querySelectorAll("thead th");
    const widths = [...headers].map((th) => th.offsetWidth);
    localStorage.setItem(getTableKey(table), JSON.stringify(widths));
}

function loadWidths(table) {
    const saved = localStorage.getItem(getTableKey(table));
    if (!saved) return;
    const widths = JSON.parse(saved);
    const headers = table.querySelectorAll("thead th");
    headers.forEach((th, i) => {
        if (widths[i]) th.style.width = widths[i] + "px";
    });
}

function initColumnResize() {
    document
        .querySelectorAll(".fi-fo-table-repeater table")
        .forEach((table) => {
            if (table.dataset.resizeInit) return;
            table.dataset.resizeInit = "1";

            loadWidths(table);

            const headers = table.querySelectorAll("thead th");
            headers.forEach((th, index) => {
                if (index === headers.length - 1) return;

                const handle = document.createElement("div");
                handle.className = "col-resize-handle";
                th.appendChild(handle);

                let startX = 0,
                    startWidth = 0;

                handle.addEventListener("mousedown", (e) => {
                    e.preventDefault();
                    startX = e.pageX;
                    startWidth = th.offsetWidth;
                    handle.classList.add("is-resizing");
                    table.classList.add("is-resizing");

                    const onMouseMove = (e) => {
                        const newWidth = Math.max(
                            80,
                            startWidth + (e.pageX - startX),
                        );
                        th.style.width = newWidth + "px";
                    };
                    const onMouseUp = () => {
                        handle.classList.remove("is-resizing");
                        table.classList.remove("is-resizing");
                        saveWidths(table);
                        document.removeEventListener("mousemove", onMouseMove);
                        document.removeEventListener("mouseup", onMouseUp);
                    };

                    document.addEventListener("mousemove", onMouseMove);
                    document.addEventListener("mouseup", onMouseUp);
                });
            });
        });
}

/* ── Fullscreen ─────────────────────────────────────── */
const ICON_EXPAND = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V5a1 1 0 011-1h3M4 16v3a1 1 0 001 1h3m10-14h-3a1 1 0 00-1 1v3m4 10h-3a1 1 0 01-1-1v-3" />
</svg>`;

const ICON_COMPRESS = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V6a1 1 0 00-1-1H5M9 15v3a1 1 0 01-1 1H5m14-10h-3a1 1 0 01-1-1V5m4 10h-3a1 1 0 00-1 1v3" />
</svg>`;

function initFullscreen() {
    let overlay = document.getElementById("repeater-fs-overlay");
    if (!overlay) {
        overlay = document.createElement("div");
        overlay.id = "repeater-fs-overlay";
        overlay.style.cssText = `
            display: none;
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: white;
            padding: 12px;
            overflow: auto;
        `;
        document.body.appendChild(overlay);
    }

    document.querySelectorAll(".fi-fo-table-repeater").forEach((repeater) => {
        if (repeater.dataset.fsInit) return;
        repeater.dataset.fsInit = "1";

        const section = repeater.closest(".fi-section");
        if (!section) return;
        const heading = section.querySelector(".fi-section-header-heading");
        if (!heading) return;

        const headingRow = heading.parentElement;
        headingRow.style.display = "flex";
        headingRow.style.alignItems = "center";
        headingRow.style.gap = "8px";

        const btn = document.createElement("button");
        btn.className = "repeater-fullscreen-btn";
        btn.type = "button";
        btn.innerHTML = ICON_EXPAND + " Fullscreen";

        btn.addEventListener("click", (e) => {
            e.stopPropagation();
            const isFullscreen = !repeater._isFullscreen;
            repeater._isFullscreen = isFullscreen;

            if (isFullscreen) {
                repeater._originalParent = repeater.parentNode;
                repeater._originalNextSibling = repeater.nextSibling;
                overlay.appendChild(repeater);
                overlay.style.display = "block";
                repeater.scrollTop = 0;
            } else {
                exitFullscreen(repeater, overlay);
            }

            btn.innerHTML = isFullscreen
                ? ICON_COMPRESS + " Exit fullscreen"
                : ICON_EXPAND + " Fullscreen";
        });

        headingRow.appendChild(btn);
    });

    if (!document._fullscreenEscBound) {
        document._fullscreenEscBound = true;
        document.addEventListener("keydown", (e) => {
            if (e.key !== "Escape") return;
            const overlay = document.getElementById("repeater-fs-overlay");
            const repeater = overlay?.querySelector(".fi-fo-table-repeater");
            if (!repeater) return;
            exitFullscreen(repeater, overlay);
            const btn = repeater._originalParent
                ?.closest(".fi-section")
                ?.querySelector(".repeater-fullscreen-btn");
            if (btn) btn.innerHTML = ICON_EXPAND + " Fullscreen";
            repeater._isFullscreen = false;
        });
    }
}

function exitFullscreen(repeater, overlay) {
    if (repeater._originalParent) {
        repeater._originalParent.insertBefore(
            repeater,
            repeater._originalNextSibling,
        );
    }
    overlay.style.display = "none";
}

/* ── Excel-like Copy/Paste ──────────────────────────── */
function initCopyPaste() {
    document.querySelectorAll(".fi-fo-table-repeater").forEach((repeater) => {
        if (repeater.dataset.copyPasteInit) return;
        repeater.dataset.copyPasteInit = "1";

        let copiedRows = [];
        let selectedRows = new Set();

        const table = repeater.querySelector("table");
        if (!table) return;

        // ── Row selection ────────────────────────────
        table.addEventListener("click", (e) => {
            const tr = e.target.closest("tbody tr");
            if (!tr) return;
            if (e.target.closest("input, select, textarea, button, a")) return;

            if (e.shiftKey && selectedRows.size > 0) {
                const rows = [...table.querySelectorAll("tbody tr")];
                const lastSelected = rows.findIndex((r) =>
                    r.classList.contains("row-last-selected"),
                );
                const current = rows.indexOf(tr);
                const [from, to] = [
                    Math.min(lastSelected, current),
                    Math.max(lastSelected, current),
                ];
                rows.slice(from, to + 1).forEach((r) => {
                    selectedRows.add(r);
                    r.classList.add("row-selected");
                });
            } else if (e.ctrlKey || e.metaKey) {
                if (selectedRows.has(tr)) {
                    selectedRows.delete(tr);
                    tr.classList.remove("row-selected", "row-last-selected");
                } else {
                    selectedRows.add(tr);
                    tr.classList.add("row-selected", "row-last-selected");
                }
            } else {
                selectedRows.forEach((r) =>
                    r.classList.remove("row-selected", "row-last-selected"),
                );
                selectedRows.clear();
                selectedRows.add(tr);
                tr.classList.add("row-selected", "row-last-selected");
            }
        });

        // ── Ctrl+C ───────────────────────────────────
        document.addEventListener("keydown", (e) => {
            if (!(e.ctrlKey || e.metaKey) || e.key !== "c") return;
            if (selectedRows.size === 0) return;
            if (e.target.closest("input, select, textarea")) return;

            copiedRows = [...selectedRows].map((tr) => {
                const inputs = [
                    ...tr.querySelectorAll("input, select, textarea"),
                ];
                return inputs.map((input) => ({
                    value:
                        input.type === "checkbox" ? input.checked : input.value,
                    type: input.type,
                }));
            });

            // Safe clipboard write — silently skip if not HTTPS
            try {
                const tsv = copiedRows
                    .map((row) => row.map((f) => f.value).join("\t"))
                    .join("\n");
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(tsv).catch(() => {});
                }
            } catch {}

            showToast(`Copied ${copiedRows.length} row(s) — Ctrl+V to paste`);
        });

        // ── Ctrl+V ───────────────────────────────────
        document.addEventListener("keydown", async (e) => {
            if (!(e.ctrlKey || e.metaKey) || e.key !== "v") return;
            if (e.target.closest("input, select, textarea")) return;
            if (copiedRows.length === 0) return;

            const allRows = [...table.querySelectorAll("tbody tr")];

            // Start pasting AT the selected row, not after it
            const lastSelectedRow = [...selectedRows][selectedRows.size - 1];
            let startIndex = lastSelectedRow
                ? allRows.indexOf(lastSelectedRow)
                : allRows.length;

            // If nothing selected, append at end
            if (startIndex === -1) startIndex = allRows.length;

            showToast(`Pasting ${copiedRows.length} row(s)...`);

            for (const rowData of copiedRows) {
                const currentRows = [...table.querySelectorAll("tbody tr")];
                let targetRow = currentRows[startIndex];

                if (!targetRow) {
                    // Need to add a new row
                    const addBtn =
                        repeater
                            .closest(".fi-section")
                            ?.querySelector(
                                ".fi-fo-table-repeater-add button",
                            ) ??
                        document.querySelector(
                            ".fi-fo-table-repeater-add button",
                        );
                    if (!addBtn) {
                        showToast("Could not find Add button");
                        return;
                    }
                    addBtn.click();
                    await new Promise((r) => setTimeout(r, 400));
                    const updatedRows = [...table.querySelectorAll("tbody tr")];
                    targetRow = updatedRows[startIndex];
                }

                if (!targetRow) continue;

                const inputs = [
                    ...targetRow.querySelectorAll("input, select, textarea"),
                ];
                rowData.forEach((field, i) => {
                    const input = inputs[i];
                    if (!input) return;
                    if (input.type === "checkbox") {
                        input.checked =
                            field.value === true || field.value === "true";
                    } else {
                        input.value = field.value;
                    }
                    input.dispatchEvent(new Event("input", { bubbles: true }));
                    input.dispatchEvent(new Event("change", { bubbles: true }));
                });

                startIndex++;
            }

            showToast(`Pasted ${copiedRows.length} row(s) ✓`);
        });
    });
}

/* ── Toast Notification ─────────────────────────────── */
function showToast(msg) {
    let toast = document.getElementById("repeater-toast");
    if (!toast) {
        toast = document.createElement("div");
        toast.id = "repeater-toast";
        toast.style.cssText = `
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 999999;
            background: #1f2937;
            color: white;
            font-size: 12px;
            padding: 8px 14px;
            border-radius: 6px;
            opacity: 0;
            transition: opacity 0.2s;
            pointer-events: none;
        `;
        document.body.appendChild(toast);
    }
    toast.textContent = msg;
    toast.style.opacity = "1";
    clearTimeout(toast._timeout);
    toast._timeout = setTimeout(() => {
        toast.style.opacity = "0";
    }, 2500);
}
