<x-mail::message>
    <div style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
        <h1 style="background-color: #4CAF50; color: white; padding: 10px; text-align: center;">Welcome to Crypto Luminex</h1>

        <p>Hello {{ $user->name }},</p>

        <p>We're thrilled to have you join Crypto Luminex, your new home for cryptocurrency trading. Our app is designed to provide you with the best tools and resources to make informed trading decisions and maximize your investments.</p>

        <p>Here's what you can look forward to:</p>
        <ul style="list-style-type: none; padding-left: 0;">
            <li style="background: #f9f9f9; margin: 10px 0; padding: 10px; border: 1px solid #ddd;">
                <strong>Real-time Market Data:</strong> Get up-to-the-minute information on cryptocurrency prices and market trends.
            </li>
            <li style="background: #f9f9f9; margin: 10px 0; padding: 10px; border: 1px solid #ddd;">
                <strong>Advanced Trading Tools:</strong> Utilize our advanced charting tools and indicators to execute trades with precision.
            </li>
            <li style="background: #f9f9f9; margin: 10px 0; padding: 10px; border: 1px solid #ddd;">
                <strong>Secure Wallet:</strong> Store your cryptocurrencies safely with our top-notch security features.
            </li>
            <li style="background: #f9f9f9; margin: 10px 0; padding: 10px; border: 1px solid #ddd;">
                <strong>24/7 Customer Support:</strong> Get assistance whenever you need it with our round-the-clock support team.
            </li>
        </ul>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; background-color: #f9f9f9; border: 1px solid #ddd;">
                    <strong>Email Address:</strong> {{ $user->email }}
                </td>
            </tr>
        </table>

        <p>If you didn't create an account, no further action is required.</p>

        <p style="margin-top: 20px;">Best regards,<br>Crypto Luminex</p>
    </div>
</x-mail::message>
