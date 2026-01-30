<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
    <h2 style="color: #333;">Nouveau message de contact</h2>
    
    <div style="background-color: #f5f5f5; padding: 15px; border-radius: 5px; margin: 15px 0;">
        <p><strong>Nom:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        @if($phone)
            <p><strong>Téléphone:</strong> {{ $phone }}</p>
        @endif
    </div>
    
    <div style="margin: 20px 0;">
        <h3 style="color: #333;">Message:</h3>
        <p style="white-space: pre-wrap; line-height: 1.6;">{{ $msg }}</p>
    </div>
    
    <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">
    <p style="color: #999; font-size: 12px;">Ce message a été envoyé via le formulaire de contact du site</p>
</div>
