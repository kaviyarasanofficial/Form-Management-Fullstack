document.addEventListener('DOMContentLoaded', function() {
    const openModalBtn = document.getElementById('openModal');
    const modal = document.getElementById('dateRangeModal');
    const downloadBtn = document.getElementById('downloadBtn');
    
    openModalBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });
    
    downloadBtn.addEventListener('click', function() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        
        modal.style.display = 'none';
        
        // Send the selected date range to the server using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'download.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Trigger the file download
                    const blob = new Blob([xhr.response], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'data.xlsx';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                } else {
                    console.error('Error downloading data.');
                }
            }
        };
        
        xhr.send('startDate=' + encodeURIComponent(startDate) + '&endDate=' + encodeURIComponent(endDate));
    });
});
