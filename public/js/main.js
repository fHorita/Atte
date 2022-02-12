'use strict';

{
  const startWork = document.getElementById('startWork');
  const endWork = document.getElementById('endWork');
  const startRest = document.getElementById('startRest');
  const endRest = document.getElementById('endRest');

  window.addEventListener('load', () => {
    const myStatus = location.pathname;

    switch (myStatus) {
      case '/login':
        if (startWork.classList.contains('hidden')) {
          startWork.classList.remove('hidden');
        }
        if (!endWork.classList.contains('hidden')) {
          endWork.classList.add('hidden');
        }
        if (!startRest.classList.contains('hidden')) {
          startRest.classList.add('hidden');
        }
        if (!endRest.classList.contains('hidden')) {
          endRest.classList.add('hidden');
        }
        break;
      case '/attendance_start':
        if (!startWork.classList.contains('hidden')) {
          startWork.classList.add('hidden');
        }
        if (endWork.classList.contains('hidden')) {
          endWork.classList.remove('hidden');
        }
        if (startRest.classList.contains('hidden')) {
          startRest.classList.remove('hidden');
        }
        if (!endRest.classList.contains('hidden')) {
          endRest.classList.add('hidden');
        }
        break;
      case '/attendance_end':
        if (startWork.classList.contains('hidden')) {
          startWork.classList.remove('hidden');
        }
        if (!endWork.classList.contains('hidden')) {
          endWork.classList.add('hidden');
        }
        if (!startRest.classList.contains('hidden')) {
          startRest.classList.add('hidden');
        }
        if (!endRest.classList.contains('hidden')) {
          endRest.classList.add('hidden');
        }
        break;
      case '/break_start':
        if (!startWork.classList.contains('hidden')) {
          startWork.classList.add('hidden');
        }
        if (!endWork.classList.contains('hidden')) {
          endWork.classList.add('hidden');
        }
        if (!startRest.classList.contains('hidden')) {
          startRest.classList.add('hidden');
        }
        if (endRest.classList.contains('hidden')) {
          endRest.classList.remove('hidden');
        }
        break;
      case '/break_end':
        if (!startWork.classList.contains('hidden')) {
          startWork.classList.add('hidden');
        }
        if (endWork.classList.contains('hidden')) {
          endWork.classList.remove('hidden');
        }
        if (startRest.classList.contains('hidden')) {
          startRest.classList.remove('hidden');
        }
        if (!endRest.classList.contains('hidden')) {
          endRest.classList.add('hidden');
        }
        break;
    }

  });

  const myStatus = location.pathname;

  switch (myStatus) {
    case 'login':
      if (startWork.classList.contains('hidden')) {
        startWork.classList.remove('hidden');
      }
      if (!endWork.classList.contains('hidden')) {
        endWork.classList.add('hidden');
      }
      if (!startRest.classList.contains('hidden')) {
        startRest.classList.add('hidden');
      }
      if (!endRest.classList.contains('hidden')) {
        endRest.classList.add('hidden');
      }
      break;
    case 'attendance_start':
      if (!startWork.classList.contains('hidden')) {
        startWork.classList.add('hidden');
      }
      if (endWork.classList.contains('hidden')) {
        endWork.classList.remove('hidden');
      }
      if (startRest.classList.contains('hidden')) {
        startRest.classList.remove('hidden');
      }
      if (!endRest.classList.contains('hidden')) {
        endRest.classList.add('hidden');
      }
      break;
    case 'attendance_end':
      if (startWork.classList.contains('hidden')) {
        startWork.classList.remove('hidden');
      }
      if (!endWork.classList.contains('hidden')) {
        endWork.classList.add('hidden');
      }
      if (!startRest.classList.contains('hidden')) {
        startRest.classList.add('hidden');
      }
      if (!endRest.classList.contains('hidden')) {
        endRest.classList.add('hidden');
      }
      break;
    case 'break_start':
      if (!startWork.classList.contains('hidden')) {
        startWork.classList.add('hidden');
      }
      if (endWork.classList.contains('hidden')) {
        endWork.classList.remove('hidden');
      }
      if (!startRest.classList.contains('hidden')) {
        startRest.classList.add('hidden');
      }
      if (endRest.classList.contains('hidden')) {
        endRest.classList.remove('hidden');
      }
      break;
    case 'break_end':
      if (!startWork.classList.contains('hidden')) {
        startWork.classList.add('hidden');
      }
      if (endWork.classList.contains('hidden')) {
        endWork.classList.remove('hidden');
      }
      if (startRest.classList.contains('hidden')) {
        startRest.classList.remove('hidden');
      }
      if (!endRest.classList.contains('hidden')) {
        endRest.classList.add('hidden');
      }
      break;
  }

}