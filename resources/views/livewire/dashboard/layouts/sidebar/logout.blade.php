<button wire:click="logout" type="submit" class="ctr-actionLogout flex items-center max-xl:justify-center bg-transparent p-2 rounded-xl max-xl:size-16 max-xl:aspect-square xl:rounded-xl text-gray-300">
    <div class="cActionLogout flex items-center justify-center gap-4">
        <div class="icnLogout size-8 flex items-center justify-center" role="img" aria-label="Icon Logout">
            <ag-icon class="text-2xl text-center">
                <i class="fas fa-arrow-right-from-bracket"></i>
            </ag-icon>
        </div>
        <div class="txLblAction text-sm hidden xl:block">
            <p>Logout</p>
        </div>
    </div>
</button>