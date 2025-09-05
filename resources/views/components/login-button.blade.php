<button id="login-btn" type="submit" class="ms-3">
    {{ $slot }}
</button>

<style>
    #login-btn {
        background-color: #94AF9F;
        color: #fff;
        font-weight: 600;
        padding: 10px 10px;
        border-radius: 8px;
        transition: background 0.2s ease-in-out;
    }

    #login-btn:hover {
        background-color: #7f998a;
    }

    #login-btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(148, 175, 159, 0.5);
    }
</style>
