
// values of threat percentages 
const threatDetection={'phishing':'can detect upto 96%','XSS':'can detect upto 95%','SQL':'can detect upto 97%','malware':'can detect upto 96.7%'};
//function to hover on threat images
function handleHover(el){
    const t=document.getElementById('tooltip');
    const classname=el.target.classList[0];
    if (!threatDetection[classname]) return;
    t.innerText=threatDetection[classname];
    t.style.display='block';
    t.style.color='whitesmoke';
    tooltip.style.left = e.pageX + 10 + 'px';
    tooltip.style.top = e.pageY + 10 + 'px';

}
function hideTooltip() {
    document.getElementById('tooltip').style.display = 'none';
}
document.querySelector('.images').addEventListener('mouseover', handleHover);
document.querySelector('.images').addEventListener('mouseout', hideTooltip);




