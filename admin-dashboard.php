<?php
session_start();
require_once 'conn.php';

if(!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin-login.php');
    exit();
}

$lottery_types = [];
$type_query = "SELECT * FROM lottery_types ORDER BY id";
$type_result = mysqli_query($conn, $type_query);
while($row = mysqli_fetch_assoc($type_result)) {
    $lottery_types[$row['id']] = $row;
}

if(isset($_POST['add_ticket'])) {
    $lottery_type_id = mysqli_real_escape_string($conn, $_POST['lottery_type_id']);
    $ticket_number = mysqli_real_escape_string($conn, $_POST['ticket_number']);
    $prize_amount = mysqli_real_escape_string($conn, $_POST['prize_amount']);
    $prize_description = mysqli_real_escape_string($conn, $_POST['prize_description']);
    
    $query = "INSERT INTO lottery_tickets (lottery_type_id, ticket_number, prize_amount, prize_description) 
              VALUES ('$lottery_type_id', '$ticket_number', '$prize_amount', '$prize_description')";
    
    if(mysqli_query($conn, $query)) {
        $success_message = "Ticket added successfully!";
    } else {
        $error_message = "Error adding ticket: " . mysqli_error($conn);
    }
}

if(isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    $query = "DELETE FROM lottery_tickets WHERE id = '$id'";
    
    if(mysqli_query($conn, $query)) {
        $success_message = "Ticket deleted successfully!";
    } else {
        $error_message = "Error deleting ticket: " . mysqli_error($conn);
    }
}

$tickets = [];
$ticket_query = "SELECT lt.*, ltp.name as lottery_name 
                 FROM lottery_tickets lt 
                 JOIN lottery_types ltp ON lt.lottery_type_id = ltp.id 
                 ORDER BY lt.created_at DESC";
$ticket_result = mysqli_query($conn, $ticket_query);
while($row = mysqli_fetch_assoc($ticket_result)) {
    $tickets[] = $row;
}

$ticket_counts = [];
foreach($lottery_types as $type) {
    $count_query = "SELECT COUNT(*) as count FROM lottery_tickets WHERE lottery_type_id = {$type['id']}";
    $count_result = mysqli_query($conn, $count_query);
    $count_data = mysqli_fetch_assoc($count_result);
    $ticket_counts[$type['id']] = $count_data['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Dashboard - LottoElite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-gold { background: linear-gradient(135deg, #FFD700 0%, #FFED4E 100%); }
        .gradient-silver { background: linear-gradient(135deg, #C0C0C0 0%, #E5E5E5 100%); }
        .gradient-bronze { background: linear-gradient(135deg, #CD7F32 0%, #E39C5B 100%); }
    </style>
</head>
<body class="font-inter bg-gray-900 text-gray-100 min-h-screen">
    <header class="bg-gray-800 shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-lg gradient-gold flex items-center justify-center">
                        <i class="fas fa-cog text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">Lottery Dashboard</h1>
                        <p class="text-xs text-gray-400">Ticket & Prize Management</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="index.php" class="text-gray-300 hover:text-yellow-400 transition-colors">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                    <a href="logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <?php if(isset($success_message)): ?>
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                <i class="fas fa-check-circle mr-2"></i> <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($error_message)): ?>
            <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i> <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="glass-effect rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Gold Lottery Tickets</p>
                        <h3 class="text-2xl font-bold mt-2"><?php echo $ticket_counts[1] ?? 0; ?></h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg gradient-gold flex items-center justify-center">
                        <i class="fas fa-crown text-white text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="glass-effect rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Silver Lottery Tickets</p>
                        <h3 class="text-2xl font-bold mt-2"><?php echo $ticket_counts[2] ?? 0; ?></h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg gradient-silver flex items-center justify-center">
                        <i class="fas fa-medal text-gray-800 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="glass-effect rounded-xl p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Bronze Lottery Tickets</p>
                        <h3 class="text-2xl font-bold mt-2"><?php echo $ticket_counts[3] ?? 0; ?></h3>
                    </div>
                    <div class="w-12 h-12 rounded-lg gradient-bronze flex items-center justify-center">
                        <i class="fas fa-award text-white text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-effect rounded-xl p-6 mb-8">
            <h2 class="text-xl font-bold mb-6">Add New Ticket</h2>
            <form method="POST" action="">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-400 mb-2">Lottery Type</label>
                        <select name="lottery_type_id" required class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-yellow-500">
                            <option value="">Select Lottery</option>
                            <?php foreach($lottery_types as $type): ?>
                                <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 mb-2">Ticket Number</label>
                        <input type="text" name="ticket_number" required 
                               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-yellow-500"
                               placeholder="Example: GLD-12345">
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 mb-2">Prize Amount (৳)</label>
                        <input type="number" name="prize_amount" required step="0.01"
                               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-yellow-500"
                               placeholder="Example: 5000.00">
                    </div>
                    
                    <div>
                        <label class="block text-gray-400 mb-2">Prize Description (Optional)</label>
                        <input type="text" name="prize_description"
                               class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:outline-none focus:border-yellow-500"
                               placeholder="Example: 1st Prize">
                    </div>
                </div>
                
                <div class="mt-6">
                    <button type="submit" name="add_ticket" 
                            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-lg transition-colors">
                        <i class="fas fa-plus mr-2"></i> Add Ticket
                    </button>
                </div>
            </form>
        </div>

        <div class="glass-effect rounded-xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">All Tickets</h2>
                <span class="text-gray-400">Total: <?php echo count($tickets); ?> Tickets</span>
            </div>
            
            <?php if(empty($tickets)): ?>
                <div class="text-center py-12">
                    <i class="fas fa-ticket-alt text-4xl text-gray-600 mb-4"></i>
                    <p class="text-gray-400">No tickets found. Add new tickets.</p>
                </div>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="py-3 px-4 text-left">Lottery Type</th>
                                <th class="py-3 px-4 text-left">Ticket Number</th>
                                <th class="py-3 px-4 text-left">Prize</th>
                                <th class="py-3 px-4 text-left">Description</th>
                                <th class="py-3 px-4 text-left">Date</th>
                                <th class="py-3 px-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tickets as $ticket): ?>
                                <tr class="border-b border-gray-800 hover:bg-gray-800/50">
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium 
                                            <?php echo $ticket['lottery_name'] == 'Gold Lottery' ? 'bg-yellow-500/20 text-yellow-400' : 
                                                  ($ticket['lottery_name'] == 'Silver Lottery' ? 'bg-gray-300/20 text-gray-300' : 
                                                  'bg-yellow-700/20 text-yellow-300'); ?>">
                                            <?php echo $ticket['lottery_name']; ?>
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 font-mono"><?php echo $ticket['ticket_number']; ?></td>
                                    <td class="py-3 px-4 font-bold">৳ <?php echo number_format($ticket['prize_amount'], 2); ?></td>
                                    <td class="py-3 px-4"><?php echo $ticket['prize_description'] ?: '-'; ?></td>
                                    <td class="py-3 px-4 text-sm text-gray-400"><?php echo date('d M Y', strtotime($ticket['created_at'])); ?></td>
                                    <td class="py-3 px-4">
                                        <a href="?delete=<?php echo $ticket['id']; ?>" 
                                           onclick="return confirm('Are you sure?')"
                                           class="text-red-400 hover:text-red-300 transition-colors">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="bg-gray-800 mt-12 py-6 border-t border-gray-700">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">© 2023 LottoElite - Lottery Dashboard</p>
            <p class="text-gray-500 text-sm mt-2">Admin Access Only</p>
        </div>
    </footer>
</body>
</html>