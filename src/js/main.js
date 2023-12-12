// Import our custom CSS
import '../scss/styles.scss';

let colorShowcase = {

	// 
	section: undefined,
	rows: undefined,
	cols: undefined,
	buttons: undefined,

	// 
	_instance: () => {

		colorShowcase.section = document.querySelectorAll('#spinu--container');
		colorShowcase.rows = colorShowcase.section[0].querySelectorAll('.row');
		colorShowcase.cols = colorShowcase.section[0].querySelectorAll('.column');
		colorShowcase.buttons = colorShowcase.section[0].querySelectorAll('.button');

		// attach event handlers to listeners for click and hover (mouse enter/leave)
		colorShowcase.section[0].querySelectorAll('.button').forEach(button => {
			button.addEventListener('click', colorShowcase._clickHandler);
			button.addEventListener('mouseenter', colorShowcase._hoverHandler);
			button.addEventListener('mouseleave', colorShowcase._hoverHandler);
		});

	},
	// 
	_clickHandler: (e) => {
		const parentNode = e.target.closest('.column');
		const parentRow = parentNode.closest('.row');

		// added to fix bug when click leaves mouse over empty space
		// some buttons were faded out still, and we can just reset whenever we click
		colorShowcase.buttons.forEach(button => {
			button.style.opacity = 1;
		});

		if (parentRow.id === 'row-of-circles') {
			const tempNode = parentNode.parentNode.removeChild(parentNode);
			document.getElementById('row-of-squares').appendChild(tempNode);
		}

		if (parentRow.id === 'row-of-squares') {
			const tempNode = parentNode.parentNode.removeChild(parentNode);
			document.getElementById('row-of-circles').prepend(tempNode);
		}
	},

	// 
	_hoverHandler: (e) => {

		// gather an array of all the columns in this row (nodes)
		// then fade out other buttons in this row
		const col = e.target.closest('.column').parentNode.children;
		Array.from(col).forEach(sibling => {
			const siblingButton = sibling.querySelector('.button');
			if (siblingButton && siblingButton !== e.target) {
				siblingButton.style.opacity = e.type === 'mouseenter' ? '0.5' : '1';
			}
		});

		// added to fix bug when hovering didn't fade in once the button was alone in the row
		// possibly addressed by fix in click handler - not sure
		e.target.style.opacity = (e.target == 'mouseenter') ? '1' : '1';

	}


};

colorShowcase._instance();